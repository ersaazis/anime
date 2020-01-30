<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use crocodicstudio\crudbooster\helpers\CurlHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;

class UpdateFoto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap:foto {folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update image anime';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    private function scrap($url)
    {
        $folder = $this->argument('folder');
        // CURL Anime
        $urlAnime = $url;
        $reqAnime = new CurlHelper($urlAnime, "GET");
        $reqAnime->headers([
            "Accept"=>"application/json"
        ]);
        $reqAnime->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36');
        $responseAnime = $reqAnime->send();
        
        // Data Anime Lainya
        $keteranganAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box > div.box-body > table.table.table-condensed > tbody ',0);
        $keteranganAnime = $keteranganAnime->find('tr > td');

        // Judul Data Anime
        $anime=array();
        $anime['judul']=$keteranganAnime[1]->find('a',0)->plaintext;

        // Cek Data Anime
        $idAnime= DB::table('anime')->where('judul',$keteranganAnime[1]->find('a',0)->plaintext)->first();
        // dd($idAnime);
        if($idAnime){
            $id_anime=$idAnime->id;
            if($idAnime->foto == ""){
                $this->info('+ [ UPDATE ANIME ] : '.$keteranganAnime[1]->find('a',0)->plaintext);
                // Foto Anime
                $fotoAnime = HTMLDomParser::str_get_html($responseAnime)->find('img.attachment-img.poster',0)->src;
                $fotoAnimeExt=explode('.',$fotoAnime);
                $fotoAnimeExt=end($fotoAnimeExt);
                $fotoAnimeFileName=md5($fotoAnime).'.'.$fotoAnimeExt;
                $idAnime= DB::table('anime')->where('judul',$keteranganAnime[1]->find('a',0)->plaintext)->update(['foto'=>$folder.'/'.$fotoAnimeFileName]);
            }
            // LIST EPISODE ANIME
            $listEpisodeAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-episode > tbody > tr > td > a');
            $episode=count($listEpisodeAnime);
            $this->info('+ [ Update Episode Anime ]');
            $bar = $this->output->createProgressBar($episode);
            $bar->start();
            foreach($listEpisodeAnime as $item){
                $cek=DB::table('video')->where('id_anime',$id_anime)->where('judul',str_replace($anime['judul'],'',$item->plaintext))->where('foto','')->first();
                if($cek){
                    // CURL Episode Video Anime
                    $urlvideo = $item->href;
                    $reqVideo = new CurlHelper($urlvideo, "GET");
                    $reqVideo->headers([
                        "Accept"=>"application/json"
                    ]);
                    $reqAnime->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36');
                    $responseVideo = $reqVideo->send();
                    
                    // Foto Episode Video Anime
                    $fotoVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('img.attachment-img.poster',0)->src;
                    $fotoVideoAnimeExt=explode('.',$fotoVideoAnime);
                    $fotoVideoAnimeExt=end($fotoVideoAnimeExt);
                    $fotoVideoAnimeFileName=md5($fotoVideoAnime).'.'.$fotoVideoAnimeExt;
                    DB::table('video')->where('id_anime',$id_anime)->where('judul',str_replace($anime['judul'],'',$item->plaintext))->update(['foto'=>$folder.'/'.$fotoVideoAnimeFileName]);
                }
                $bar->advance();
            }
            $bar->finish();
            $this->info('');

            // LIST MOVIE ANIME
            $listMovieAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-movie > tbody > tr > td > a');
            $episode=count($listMovieAnime);
            $this->info('+ [ Update Movie Anime ]');
            $bar = $this->output->createProgressBar($episode);
            $bar->start();
            foreach($listMovieAnime as $item){
                $cek=DB::table('video')->where('id_anime',$id_anime)->where('judul',str_replace($anime['judul'],'',$item->plaintext))->where('foto','')->first();
                if($cek){
                    // CURL Movie Video Anime
                    $urlvideo = $item->href;
                    $reqVideo = new CurlHelper($urlvideo, "GET");
                    $reqVideo->headers([
                        "Accept"=>"application/json"
                    ]);
                    $reqAnime->userAgent('Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36');
                    $responseVideo = $reqVideo->send();
                    
                    // Foto Movie Video Anime
                    $fotoVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('img.attachment-img.poster',0)->src;
                    $fotoVideoAnimeExt=explode('.',$fotoVideoAnime);
                    $fotoVideoAnimeExt=end($fotoVideoAnimeExt);
                    $fotoVideoAnimeFileName=md5($fotoVideoAnime).'.'.$fotoVideoAnimeExt;
                    DB::table('video')->where('id_anime',$id_anime)->where('judul',str_replace($anime['judul'],'',$item->plaintext))->update(['foto'=>$folder.'/'.$fotoVideoAnimeFileName]);
                }
                $bar->advance();
            }
            $bar->finish();
            $this->info('');

        }
    }
    public function handle(){
        $linkAnime=DB::table('link_anime')->where('auto_update',1)->get();
        foreach($linkAnime as $item){
            // try{
                $this->scrap($item->url);
            // } catch (\Throwable $e) {
            //     $this->warn("\n!!! [ Anime ] ".$item->url);
            // }
        }
        $this->info('=============== [ Selesai ] =============== ');
    }
}
