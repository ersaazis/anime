<?php

namespace App\Http\Controllers;

use App\Events\NontonVideoAnime;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Users;

class NontonAnimeController extends Controller
{
    public function index(){

    }
    public function anime($anime){
        $video=Video::findById($anime);
        event(new NontonVideoAnime($video,cb()->session()->id()));
    }
    public function video($anime,$judul){

    }
    public function karakter($anime,$karakter){

    }
    public function genre($genre){

    }
    public function jadwal($jadwal){

    }
    public function pengumuman($pengumuman){

    }
    public function cari($cari){

    }
    public function rating($anime){

    }
    public function vote($tipe,$id){
        switch($tipe){
            case "anime":
            break;
            case "karakter":
            break;
        }
    }
}
