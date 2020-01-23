<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use App\Models\Anime;
use App\Models\Video;
use App\Models\AnimeGenre;
use App\Models\Counter;
use Illuminate\Support\Facades\DB;

class SendCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $video = $event->video;
        $user = $event->user;
        // Counter Video
        $CounterVideo=DB::table('counter')->where('tanggal',date('Y-m-d'))->where('id_video',$video->getId())->first();
        $CounterVideo=new Counter($CounterVideo);
        if($CounterVideo->getId()){
            $CounterVideo->setCounter($CounterVideo->getCounter()+1);
            $CounterVideo->save();
        } else {
            $CounterVideo->setIdUsers($user->getId());
            $CounterVideo->setIdVideo($video->getId());
            $CounterVideo->setTanggal(date('Y-m-d'));
            $CounterVideo->setCounter(1);
            $CounterVideo->save();
        }
        // Counter Anime
        $CounterAnime=DB::table('counter')->where('tanggal',date('Y-m-d'))->where('id_anime',$video->getIdAnime()->getId())->first();
        $CounterAnime=new Counter($CounterAnime);
        if($CounterAnime->getId()){
            $CounterAnime->setCounter($CounterAnime->getCounter()+1);
            $CounterAnime->save();
        } else {
            $CounterAnime->setIdUsers($user->getId());
            $CounterAnime->setIdAnime($video->getIdAnime()->getId());
            $CounterAnime->setTanggal(date('Y-m-d'));
            $CounterAnime->setCounter(1);
            $CounterAnime->save();
        }
        // Counter Genre
        $genreAnime=AnimeGenre::findAllByIdAnime($video->getIdAnime()->getId());
        foreach($genreAnime as $ga){
            $CounterGenre=DB::table('counter')->where('tanggal',date('Y-m-d'))->where('id_genre',$ga->id_genre)->first();
            $CounterGenre=new Counter($CounterGenre);
            if($CounterGenre->getId()){
                $CounterGenre->setCounter($CounterGenre->getCounter()+1);
                $CounterGenre->save();
            } else {
                $CounterGenre->setIdUsers($user->getId());
                $CounterGenre->setIdGenre($ga->id_genre);
                $CounterGenre->setTanggal(date('Y-m-d'));
                $CounterGenre->setCounter(1);
                $CounterGenre->save();
            }
        }
        
    }
}
