<?php

namespace App\Http\Controllers;

use App\Events\NontonVideoAnime;
use App\Models\Anime;
use App\Models\AnimeGenre;
use App\Models\Genre;
use App\Models\Karakter;
use App\Models\Pengumuman;
use App\Models\Video;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NontonAnimeController extends Controller
{
    public function index(){

    }
    public function anime($anime){
        // 4
        $anime=Anime::findByJudulAlternatif($anime);
        $video=Video::findAllByIdAnime($anime->getId());
    }
    public function video($anime,$judul){
        // 5
        $anime=Anime::findByJudulAlternatif($anime);
        $video=DB::table('video')->where('id_anime',$anime->getId())->where('judul_alternatif',$judul)->first();
        $video=new Video($video);
        if(cb()->session()->id())
            event(new NontonVideoAnime($video,cb()->session()->id()));
    }
    public function karakter($anime,$karakter){
        // 6
        $anime=Anime::findByJudulAlternatif($anime);
        $karakter=DB::table('karakter')->where('id_anime',$anime->getId())->where('nama_alternatif',$karakter)->first();
        $karakter=new Karakter($karakter);
    }
    public function genre($genre){
        // 7
        $genre=Genre::findByNamaAlternatif($genre);
        $genreAnime=AnimeGenre::findAllByIdGenre($genre->getId());
        $anime=array();
        foreach($genreAnime as $ga){
            $anime[]=Anime::findById($ga->id_anime);
        }

    }
    public function jadwal($jadwal){
        // 8
        $anime=Anime::all();
    }
    public function pengumuman($pengumuman){
        // 9
        $pengumuman=DB::table('pengumuman')->where('tanggal','<=',date('Y-m-d'))->get();
    }
    public function cari($cari){
        // 10
        $anime=Anime::findAllByJudul($cari);
    }
    public function rating($anime){
        // 1
    }
    public function vote($tipe,$id){
        switch($tipe){
            case "anime":
                // 2
            break;
            case "karakter":
                // 3
            break;
        }
    }
}
