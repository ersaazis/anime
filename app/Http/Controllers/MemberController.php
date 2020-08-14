<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function getIndex() {
        // member
        $member=DB::table('users')->where('cb_roles_id',2);
        $memberTerdaftar=$member->count();
        $memberTerverifikasi=$member->where('email_verified_at','!=',NULL)->count();

        // anime
        $anime=DB::table('anime');
        $animeTerdaftar=$anime->count();
        $animeTervote=$anime->where('voter','!=',NULL)->count();
        $hari=array(
            1=>'senin',
            2=>'selasa',
            3=>'rabu',
            4=>'kamis',
            5=>'jumat',
            6=>'sabtu',
            0=>'minggu',
        );
        $hariN = date('w');
        $dataAnimeUpdate=DB::table('anime')->where('status','ongoing')->where('hari_tayang',$hari[$hariN])->get();
        
        // video
        $video=DB::table('video');
        $videoTerdaftar=$video->count();
        $videoRusak=$video->where('jum_report','>',0)->count();
        $dataVideoRusak=DB::table('video')
            ->join('anime','anime.id','=','video.id_anime')
            ->select([
                'video.*',
                'anime.judul as judul_anime',
                'anime.judul_alternatif as judul_alternatif_anime',
            ])
            ->where('jum_report','>',0)
            ->get();
       
        // karakter
        $karakter=DB::table('karakter');
        $karakterTerdaftar=$karakter->count();
        $karakterTervote=$karakter->where('voter','!=',NULL)->count();
        
        // chart anime
        $anime=DB::table('anime')->orderBy('voter','DESC')->limit(5);
        $dataReportAnime=array();
        for ($i=1; $i <= date('t'); $i++) { 
            foreach ($anime->get() as $item) {
                $reportAnime=DB::table('counter')
                ->join('anime','anime.id','=','counter.id_anime')
                ->where('id_anime',$item->id)
                ->where('tanggal',date('Y-m-').$i)
                ->first();
                $dataReportAnime[$i][$item->judul_alternatif]=($reportAnime)?$reportAnime->counter:0;
            }
            $dataReportAnime[$i]['tanggal']=date('Y-m-').$i;
        }
        $labelReportAnime=$anime->get(['judul','judul_alternatif'])->toArray();

        // chart video
        $video=DB::table('video')
        ->join('anime','anime.id','=','video.id_anime')
        ->select([
            'video.*',
            'anime.voter as voter_anime',
            'anime.judul as judul_anime',
            'anime.judul_alternatif as judul_alternatif_anime',
        ])->orderBy('anime.voter','DESC')->limit(5);
        $dataReportVideo=array();
        for ($i=1; $i <= date('t'); $i++) { 
            foreach ($video->get() as $item) {
                $reportVideo=DB::table('counter')
                ->join('video','video.id','=','counter.id_video')
                ->where('id_video',$item->id)
                ->where('tanggal',date('Y-m-').$i)
                ->first();
                $dataReportVideo[$i][$item->judul_alternatif.$item->id]=($reportVideo)?$reportVideo->counter:0;
            }
            $dataReportVideo[$i]['tanggal']=date('Y-m-').$i;
        }
        $labelReportVideo=$video->get(['judul',DB::raw('CONCAT(judul_alternatif,id) as judul_alternatif')])->toArray();

        // chart genre
        $genre=DB::table('genre')
        ->join('anime_genre','genre.id','=','anime_genre.id_genre')
        ->join('anime','anime.id','=','anime_genre.id_anime')
        ->select([
            'genre.*',
            DB::raw('sum(anime.voter) as voter_anime'),
        ])->groupBy('genre.id')->orderBy('voter_anime','DESC')->limit(5);
        $dataReportGenre=array();
        for ($i=1; $i <= date('t'); $i++) { 
            foreach ($genre->get() as $item) {
                $reportGenre=DB::table('counter')
                ->join('genre','genre.id','=','counter.id_genre')
                ->where('id_genre',$item->id)
                ->where('tanggal',date('Y-m-').$i)
                ->first();
                $dataReportGenre[$i][$item->nama_alternatif.$item->id]=($reportGenre)?$reportGenre->counter:0;
            }
            $dataReportGenre[$i]['tanggal']=date('Y-m-').$i;
        }
        $labelReportGenre=$genre->get(['nama',DB::raw('CONCAT(nama_alternatif,id) as nama_alternatif')])->toArray();

        $animeTrending=DB::table('anime')
            ->leftJoin('counter','anime.id','=','counter.id_anime')
            ->select(
                'anime.*',
                'counter.tanggal',
                DB::raw('SUM(counter.counter) as counter')
            )
            ->where('counter.tanggal',date('Y-m-d'))
            ->orWhere('counter.tanggal',NULL)
            ->groupBy('anime.id')
            ->limit(3)
            ->get();

        $videoTrending=DB::table('video')
            ->leftJoin('counter','video.id','=','counter.id_video')
            ->leftJoin('anime','video.id_anime','=','anime.id')
            ->select(
                'video.*',
                'anime.judul as judul_anime',
                'anime.id as id_anime_id',
                'anime.judul_alternatif as judul_alternatif_anime',
                'anime.rating',
                'anime.voter',
                'anime.total_episode',
                'anime.hari_tayang',
                'anime.status',
                DB::raw('SUM(counter.counter) as counter')
            )
            ->where('counter.tanggal',date('Y-m-d'))
            ->orWhere('counter.tanggal',NULL)
            ->groupBy('video.id')
            ->orderBy('counter','DESC')
            ->limit(3)
            ->get();

        $data = [];
        $data['page_title'] = "Dashboard";

        $data['memberTerdaftar'] = $memberTerdaftar;
        $data['memberTerverifikasi'] = $memberTerverifikasi;
        $data['animeTerdaftar'] = $animeTerdaftar;
        $data['animeTervote'] = $animeTervote;
        $data['dataAnimeUpdate'] = $dataAnimeUpdate;
        $data['videoTerdaftar'] = $videoTerdaftar;
        $data['videoRusak'] = $videoRusak;
        $data['dataVideoRusak'] = $dataVideoRusak;
        $data['karakterTerdaftar'] = $karakterTerdaftar;
        $data['karakterTervote'] = $karakterTervote;
        $data['dataReportAnime'] = $dataReportAnime;
        $data['labelReportAnime'] = $labelReportAnime;
        $data['dataReportVideo'] = $dataReportVideo;
        $data['labelReportVideo'] = $labelReportVideo;
        $data['dataReportGenre'] = $dataReportGenre;
        $data['labelReportGenre'] = $labelReportGenre;
        $data['animeTrending'] = $animeTrending;
        $data['videoTrending'] = $videoTrending;
        $data['i'] = $data['j'] = $data['k'] = $data['l'] = $data['m'] = $data['n'] = $data['o'] = $data['p'] = 1;
        $data['color'] = [
            1=>'bg-aqua-active',
            2=>'bg-green-active',
            3=>'bg-yellow-active',
            4=>'bg-red-active',
            5=>'bg-blue-active',
            6=>'bg-blue-active',
        ];
        return view("dashboard", $data);
    }
    public function index()
    {
        // chart Genre
        // chart Anime
        // chart Video
    }
}
