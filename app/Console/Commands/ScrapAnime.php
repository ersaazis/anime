<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use crocodicstudio\crudbooster\helpers\CurlHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use KubAT\PhpSimple\HtmlDomParser;
use Illuminate\Support\Str;

class ScrapAnime extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap:anime {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrap anime from nanime';

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
    public function handle()
    {
        // CURL Anime
        $urlAnime = $this->argument('url');
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
        $id_anime= DB::table('anime')->where('judul',$keteranganAnime[1]->find('a',0)->plaintext)->first('id');
        if($id_anime){
            $id_anime=$id_anime->id;
            $this->info('+ [ UPDATE ANIME ] : '.$keteranganAnime[1]->find('a',0)->plaintext);
        }
        else {
            // Foto Anime
            $fotoAnime = HTMLDomParser::str_get_html($responseAnime)->find('img.attachment-img.poster',0)->src;
            $fotoAnimeExt=explode('.',$fotoAnime);
            $fotoAnimeExt=end($fotoAnimeExt);
            $fotoAnimeFileName=md5(time()).'.'.$fotoAnimeExt;
            Storage::disk('scrap')->put($fotoAnimeFileName, file_get_contents($fotoAnime));
            
            // Deskripsi Anime
            $deskripsiAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.attachment-text',0)->plaintext;

            // Data Anime Lengkap
            $anime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoAnimeFileName;
            $anime['judul_alternatif']=Str::slug($keteranganAnime[1]->plaintext);
            $anime['status']=strtolower($keteranganAnime[9]->plaintext);
            $anime['total_episode']=($keteranganAnime[11]->plaintext == 'Unknown')?NULL:$keteranganAnime[11]->plaintext;
            $anime['hari_tayang']=strtolower($keteranganAnime[15]->plaintext);
            $anime['deskripsi']=$deskripsiAnime;

            // Simpan Data Anime
            $id_anime= DB::table('anime')->insertGetId($anime);
            $genre=explode(' ',$keteranganAnime[17]->plaintext);
            $idGenre=array();
            foreach($genre as $item){
                DB::table('genre')->updateOrInsert(['nama' => $item]);
                $idGenre=DB::table('genre')->where('nama',$item)->first('id')->id;
                DB::table('anime_genre')->insert(['id_anime' => $id_anime,'id_genre' => $idGenre]);
            }
            $this->info('+ [ ANIME ] : '.$anime['judul']);
        }

        // LIST EPISODE ANIME
        $listEpisodeAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-episode > tbody > tr > td > a');
        foreach($listEpisodeAnime as $item){
            // Cek Episode Video Anime
            $cekVideo= DB::table('video')->where('judul',str_replace($anime['judul'],'',$item->plaintext))->doesntExist();
            if($cekVideo){
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
                $fotoVideoAnimeFileName=md5(time()).'.'.$fotoVideoAnimeExt;
                Storage::disk('scrap')->put($fotoVideoAnimeFileName, file_get_contents($fotoVideoAnime));

                // Deskripsi Episode Video Anime
                $deskripsiVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('div.attachment-text',0)->plaintext;

                // Data Episode Video Anime Lengkap
                $videoAnime=array();
                $videoAnime['judul']=str_replace($anime['judul'],'',$item->plaintext);
                $videoAnime['judul_alternatif']=Str::slug($videoAnime['judul']);
                $videoAnime['tipe']='episode';
                $videoAnime['episode']=0;
                $videoAnime['id_anime']=$id_anime;
                $videoAnime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoVideoAnimeFileName;
                $videoAnime['deskripsi']=$deskripsiVideoAnime;
                // Server Episode Video Anime
                $i=1;
                $dataVideo = HTMLDomParser::str_get_html($responseVideo)->find('select#change-server > option');
                foreach($dataVideo as $item){
                    if($i <= 4)
                    $videoAnime['server'.$i++]=$item->value;
                }
                DB::table('video')->insert($videoAnime);
                $this->info('+ [ Episode ] : '.$videoAnime['judul']);
                // sleep(1);
            }
            // else
            //     $this->info('   - [ SKIP Episode ] : '.str_replace($anime['judul'],'',$item->plaintext));
        }

        // LIST MOVIE ANIME
        $listMovieAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-movie > tbody > tr > td > a');
        foreach($listMovieAnime as $item){
            // Cek Movie Video Anime
            $cekVideo= DB::table('video')->where('judul',$item->plaintext)->doesntExist();
            if($cekVideo){
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
                $fotoVideoAnimeFileName=md5(time()).'.'.$fotoVideoAnimeExt;
                Storage::disk('scrap')->put($fotoVideoAnimeFileName, file_get_contents($fotoVideoAnime));

                // Deskripsi Movie Video Anime
                $deskripsiVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('div.attachment-text',0)->plaintext;

                // Data Movie Video Anime Lengkap
                $videoAnime=array();
                $videoAnime['judul']=$item->plaintext;
                $videoAnime['judul_alternatif']=Str::slug($videoAnime['judul']);
                $videoAnime['tipe']='movie';
                $videoAnime['episode']=0;
                $videoAnime['id_anime']=$id_anime;
                $videoAnime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoVideoAnimeFileName;
                $videoAnime['deskripsi']=$deskripsiVideoAnime;
                // Server Movie Video Anime
                $i=1;
                $dataVideo = HTMLDomParser::str_get_html($responseVideo)->find('select#change-server > option');
                foreach($dataVideo as $item){
                    if($i <= 4)
                    $videoAnime['server'.$i++]=$item->value;
                }
                DB::table('video')->insert($videoAnime);
                $this->info('+ [ Movie ] : '.$videoAnime['judul']);
                // sleep(1);
            }
            // else
            //     $this->info('   - [ SKIP Movie ] : '.$item->plaintext);
        }
    }
}
