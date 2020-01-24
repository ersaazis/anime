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
use Illuminate\Support\Str;

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
            7=>'minggu',
        );
        $hariN = idate('w', time());
        $rilisHariIni=Anime::findAllByHariTayang($hari[$hariN]);
        $tags=Genre::all();
        $animeFavorit=DB::table('anime')->orderBy('voter','DESC')->limit(8)->get();
        $karakterFavorit=DB::table('karakter')->orderBy('voter','DESC')->limit(8)->get();

        $this->data['pengumuman']=$pengumuman;
        $this->data['tags']=$tags;
        $this->data['animeFavorit']=$animeFavorit;
        $this->data['karakterFavorit']=$karakterFavorit;
        $this->data['animeTayang']=$rilisHariIni;
    }
    public function index(){
        return view('index',$this->data);
    }
    public function semuaAnime(){
        $anime=Anime::all();
        print_r($anime);
    }
    public function anime($anime){
        $anime=Anime::findByJudulAlternatif($anime);
        $video=Video::findAllByIdAnime($anime->getId());
        if(!$anime->getId())
            abort(404);
        print_r($anime);
        print_r($video);
    }
    public function video($anime,$judul){
        // 5
        $anime=Anime::findByJudulAlternatif($anime);
        $video=DB::table('video')->where('id_anime',$anime->getId())->where('judul_alternatif',$judul)->first();
        $video=new Video($video);
        if(!$anime->getId() OR !$video->getId())
            abort(404);
        if(cb()->session()->id())
            event(new NontonVideoAnime($video,cb()->session()->id()));
        print_r($anime);
        print_r($video);
    }
    public function karakter($karakter){
        $karakter=DB::table('karakter')->where('nama_alternatif',$karakter)->first();
        $karakter=new Karakter($karakter);
        if(!$karakter->getId())
            abort(404);
        print_r($karakter);    
    }
    public function genre($genre){
        $genre=Genre::findByNamaAlternatif($genre);
        if(!$genre->getId())
            abort(404);
        $genreAnime=AnimeGenre::findAllByIdGenre($genre->getId());
        $anime=array();
        foreach($genreAnime as $ga){
            $anime[]=Anime::findById($ga->id_anime);
        }
        print_r($anime);
    }
    public function jadwal(){
        $anime=Anime::all();
        print_r($anime);
    }
    public function cari(Request $request){
        $anime=DB::table('anime')->where('judul','like','%'.$request->input('cari').'%')->get();
        print_r($anime);
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
                    }
                    else {
                        $dataVote->setIdUsers(cb()->session()->id());
                        $dataVote->setIdAnime($id);
                        $dataVote->save();
                    }
                    return 'true';
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
                    }
                    else {
                        $dataVote->setIdUsers(cb()->session()->id());
                        $dataVote->setIdKarakter($id);
                        $dataVote->save();
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
}
