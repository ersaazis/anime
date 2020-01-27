<?php

namespace App\Http\Controllers;

use App\Events\NontonVideoAnime;
use App\Models\Anime;
use App\Models\AnimeGenre;
use App\Models\Genre;
use App\Models\Karakter;
use App\Models\Pengumuman;
use App\Models\Rating;
use App\Models\Video;
use App\Models\Users;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NontonAnimeController extends Controller
{
    private $data=array();
    public function __construct(){
        $pengumuman=DB::table('pengumuman')->where('tanggal_expire','>=',date('Y-m-d'))->get();
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
        $rilisHariIni=DB::table('anime')->where('hari_tayang',$hari[$hariN])->where('status','ongoing')->get();
        $tags=Genre::all();
        $animeFavorit=DB::table('anime')->orderBy('voter','DESC')->limit(8)->get();
        $karakterFavorit=DB::table('karakter')->orderBy('voter','DESC')->limit(8)->get();

        $this->data['pengumuman']=$pengumuman;
        $this->data['tags']=$tags;
        $this->data['animeFavorit']=$animeFavorit;
        $this->data['karakterFavorit']=$karakterFavorit;
        $this->data['animeTayang']=$rilisHariIni;
        // dd($rilisHariIni);
    }
    public function index(){
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
            ->limit(8)
            ->get();
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
            ->limit(8)
            ->get();
        $anime=DB::table('video')
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
            )
            ->orderBy('video.created_at','DESC')
            ->limit(8)
            ->get();
        $this->data['videoTrending']=$videoTrending;
        $this->data['animeTrending']=$animeTrending;
        $this->data['anime']=$anime;
        return view('index',$this->data);
    }
    public function semuaAnime(){
        $anime=DB::table('anime')->orderBy('created_at','DESC')->simplePaginate(20);
        $this->data['anime']=$anime;
        return view('semuaAnime',$this->data);
    }
    public function semuaVideo(){
        $video=DB::table('video')
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
        )
        ->orderBy('video.created_at','DESC')
        ->simplePaginate(20);
        $this->data['video']=$video;
        return view('semuaVideo',$this->data);
    }
    public function anime($anime){
        $anime=DB::table('anime')->where('judul_alternatif',$anime)->first();
        $video['episode']=DB::table('video')->where('tipe','episode')->where('id_anime',$anime->id)->get();
        $video['movie']=DB::table('video')->where('tipe','movie')->where('id_anime',$anime->id)->get();
        $karakterAnime=DB::table('karakter_anime')
            ->join('karakter','karakter_anime.id_karakter','=','karakter.id')
            ->where('id_anime',$anime->id)
            ->orderBy('voter','DESC')
            ->get();
        $genreAnime=DB::table('anime_genre')->where('id_anime',$anime->id);
        $where=array();
        foreach($genreAnime->get('id_genre') as $id) $where[]=$id->id_genre;
        $rekomendasiAnime=DB::table('anime_genre')
            ->join('anime','anime_genre.id_anime','=','anime.id')
            ->whereIn('id_genre',$where)
            ->orderBy('anime.voter','ASC')
            ->groupBy('anime.id')
            ->limit(5)
            ->get();
        $genre=null;
        foreach($genreAnime->get() as $item){
            $getGenre=DB::table('genre')->find($item->id_genre)->nama;
            $genre.="<span class='badge badge-secondary m-1'>".$getGenre."</span>";
        }
        if(!$anime)
            abort(404);
        return view('anime',[
            'pengumuman' => $this->data['pengumuman'],
            'genre' => $genre,
            'anime' => $anime,
            'video' => $video,
            'rekomendasiAnime' => $rekomendasiAnime,
            'karakterAnime' => $karakterAnime,
        ]);
    }
    public function video($anime,$judul){
        $anime=DB::table('anime')->where('judul_alternatif',$anime)->first();
        $video=DB::table('video')->where('id_anime',$anime->id)->where('judul_alternatif',$judul)->first();
        $karakterAnime=DB::table('karakter_anime')
            ->join('karakter','karakter_anime.id_karakter','=','karakter.id')
            ->where('id_anime',$anime->id)
            ->orderBy('voter','DESC')
            ->get();
        $genreAnime=DB::table('anime_genre')->where('id_anime',$anime->id);
        $where=array();
        foreach($genreAnime->get('id_genre') as $id) $where[]=$id->id_genre;
        $rekomendasiAnime=DB::table('anime_genre')
            ->join('anime','anime_genre.id_anime','=','anime.id')
            ->whereIn('id_genre',$where)
            ->orderBy('anime.voter','ASC')
            ->limit(5)
            ->get();
        $genre=null;
        foreach($genreAnime->get() as $item){
            $getGenre=DB::table('genre')->find($item->id_genre)->nama;
            $genre.="<span class='badge badge-secondary m-1'>".$getGenre."</span>";
        }
    
        if(!$anime OR !$video)
            abort(404);
        $nextVideo=DB::table('video')->where('id_anime',$anime->id)->where('tipe','episode')->where('episode',$video->episode+1)->first();
        $prevVideo=DB::table('video')->where('id_anime',$anime->id)->where('tipe','episode')->where('episode',$video->episode-1)->first();
        if(cb()->session()->id()){
            $eventVideo=new Video($video);
            event(new NontonVideoAnime($eventVideo,cb()->session()->id()));
        }
        return view('video',[
            'pengumuman' => $this->data['pengumuman'],
            'genre' => $genre,
            'anime' => $anime,
            'video' => $video,
            'nextVideo' => $nextVideo,
            'prevVideo' => $prevVideo,
            'rekomendasiAnime' => $rekomendasiAnime,
            'karakterAnime' => $karakterAnime,
        ]);
    }
    public function karakter($karakter){
        $karakter=DB::table('karakter')->where('nama_alternatif',$karakter)->first();
        $anime=DB::table('karakter_anime')
            ->join('anime','karakter_anime.id_anime','=','anime.id')
            ->where('id_karakter',$karakter->id)
            ->get();
        if(!$karakter->id)
            abort(404);
        return view('karakter',[
            'pengumuman' => $this->data['pengumuman'],
            'karakter' => $karakter,
            'anime' => $anime,
        ]); 
    }
    public function genre($genre){
        $anime=DB::table('genre')
        ->join('anime_genre','anime_genre.id_genre','=','genre.id')
        ->join('anime','anime_genre.id_anime','=','anime.id')
        ->where('nama_alternatif',$genre)
        ->simplePaginate(20);
        $this->data['title']=DB::table('genre')->where('nama_alternatif',$genre)->first()->nama;
        $this->data['anime']=$anime;
        return view('genreAnime',$this->data);
    }
    public function jadwal(){
        $anime=array();
        $anime['senin']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','senin')->orderBy('created_at','DESC')->get();
        $anime['selasa']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','selasa')->orderBy('created_at','DESC')->get();
        $anime['rabu']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','rabu')->orderBy('created_at','DESC')->get();
        $anime['kamis']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','kamis')->orderBy('created_at','DESC')->get();
        $anime['jumat']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','jumat')->orderBy('created_at','DESC')->get();
        $anime['sabtu']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','sabtu')->orderBy('created_at','DESC')->get();
        $anime['minggu']=DB::table('anime')->where('status','ongoing')->where('hari_tayang','minggu')->orderBy('created_at','DESC')->get();
        $this->data['anime']=$anime;
        return view('jadwalAnime',$this->data);
    }
    public function cari(Request $request){
        $anime=DB::table('anime')->where('judul','like','%'.$request->input('cari').'%')->simplePaginate(20);
        $this->data['anime']=$anime;
        $this->data['cari']=$request->input('cari');
        return view('cariAnime',$this->data);
    }
    public function reportVideo($id_video){
        $video=DB::table('video')->where('id',$id_video);
        if($video->get()){
            $video->update(['jum_report' => $video->first()->jum_report+1]);
            return 'true';
        }
        else {
            return 'false';
        }
    }
    public function rating($id_anime,$rating){
        $anime=Anime::findById($id_anime);
        if($rating>5 OR $anime->getId() == NULL){
            return 'false';
        }
        else {
            $checkRating=DB::table('rating')->where('id_users',cb()->session()->id())->where('id_anime',$id_anime)->first();
            $dataRating=new Rating($checkRating);
            if($dataRating->getId()){
                $dataRating->setRating($rating);
                $dataRating->save();
            }
            else {
                $dataRating->setIdUsers(cb()->session()->id());
                $dataRating->setIdAnime($id_anime);
                $dataRating->setRating($rating);
                $dataRating->save();
            }
            $updateRating=DB::table('rating')->where('id_anime',$id_anime)->select(DB::raw('AVG(rating) as rating'))->first();
            $anime->setRating($updateRating->rating);
            $anime->save();

            return 'true';
        }
    }
    public function vote($tipe,$id){
        switch($tipe){
            case "a":
                $anime=Anime::findById($id);
                if($anime->getId()){
                    $vote=DB::table('vote')->where('id_users',cb()->session()->id())->where('id_anime',$id);
                    $checkVote=$vote->first();
                    $dataVote=new Vote($checkVote);
                    if($dataVote->getId()){
                        $vote->delete();
                        $totalVote=$anime->getVoter()-1;
                        $anime->setVoter($totalVote);
                        $anime->save();
                        return 'Di UnVote';
                    }
                    else {
                        $dataVote->setIdUsers(cb()->session()->id());
                        $dataVote->setIdAnime($id);
                        $dataVote->save();
                        $totalVote=$anime->getVoter()+1;
                        $anime->setVoter($totalVote);
                        $anime->save();
                        return 'Di Vote';
                    }
                }
                else
                    return 'false';
            break;
            case "k":
                $karakter=Karakter::findById($id);
                if($karakter->getId()){
                    $vote=DB::table('vote')->where('id_users',cb()->session()->id())->where('id_karakter',$id);
                    $checkVote=$vote->first();
                    $dataVote=new Vote($checkVote);
                    if($dataVote->getId()){
                        $vote->delete();
                        $totalVote=$karakter->getVoter()-1;
                        $karakter->setVoter($totalVote);
                        $karakter->save();
                        return 'Di UnVote';
                    }
                    else {
                        $dataVote->setIdUsers(cb()->session()->id());
                        $dataVote->setIdKarakter($id);
                        $dataVote->save();
                        $totalVote=$karakter->getVoter()+1;
                        $karakter->setVoter($totalVote);
                        $karakter->save();
                        return 'Di Vote';
                    }
                    return 'true';
                }
                else
                    return 'false';
            break;
            default:
                return 'false';
            break;
        }
    }
    public function lite(){
        $value = session('lite_mode',false);
        if($value)
            session(['lite_mode' => false]);
        else
            session(['lite_mode' => true]);
        return redirect('/');
    }
}
