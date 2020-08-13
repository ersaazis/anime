<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use ersaazis\cb\helpers\CurlHelper;
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
    protected $signature = 'scrap:anime';

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
    private function scrap($url)
    {
        $UA="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36";
        // CURL Anime
        $urlAnime = $url;
        $reqAnime = new CurlHelper($urlAnime, "GET");
        $reqAnime->headers([
            "Accept"=>"application/json"
        ]);
        $reqAnime->userAgent($UA);
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
            $fotoAnimeFileName=md5($fotoAnime).'.'.$fotoAnimeExt;
            $cekFotoAnime= DB::table('anime')->where('foto','like','%'.$fotoAnimeFileName)->first('foto');
            $cekVideoAnime= DB::table('video')->where('foto','like','%'.$fotoAnimeFileName)->first('foto');
            if(!$cekFotoAnime OR !$cekVideoAnime){
                $reqFotoAnime = new CurlHelper($fotoAnime, "GET");
                $reqFotoAnime->headers([
                "Accept"=>"application/json"
                ]);
                $reqFotoAnime->userAgent($UA);
                Storage::disk('scrap')->put(date('Y/m/d').'/'.$fotoAnimeFileName, $reqFotoAnime->send());
                $anime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoAnimeFileName;
            }
            else if($cekFotoAnime)
                $anime['foto']=$cekFotoAnime->foto;
            else if($cekVideoAnime)
                $anime['foto']=$cekVideoAnime->foto;
            
            // Deskripsi Anime
            $deskripsiAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.attachment-text',0)->plaintext;

            // Data Anime Lengkap
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
                DB::table('genre')->updateOrInsert(['nama' => $item,'nama_alternatif' => Str::slug($item)]);
                $idGenre=DB::table('genre')->where('nama',$item)->first('id')->id;
                DB::table('anime_genre')->insert(['id_anime' => $id_anime,'id_genre' => $idGenre]);
            }
            $this->info('+ [ ANIME ] : '.$anime['judul']);
        }

        // LIST EPISODE ANIME
        $listEpisodeAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-episode > tbody > tr > td > a');
        $episode=count($listEpisodeAnime);
        $this->info('+ [ Scrap Episode Anime ]');
        $bar = $this->output->createProgressBar($episode);
        $bar->start();
        foreach($listEpisodeAnime as $item){
            // Cek Episode Video Anime
            $cekVideo= DB::table('video')->where('id_anime',$id_anime)->where('judul',str_replace($anime['judul'],'',$item->plaintext))->doesntExist();
            if($cekVideo){
                // CURL Episode Video Anime
                $urlvideo = $item->href;
                $reqVideo = new CurlHelper($urlvideo, "GET");
                $reqVideo->headers([
                    "Accept"=>"application/json"
                ]);
                $reqAnime->userAgent($UA);
                $responseVideo = $reqVideo->send();
                
                // Foto Episode Video Anime
                $fotoVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('img.attachment-img.poster',0)->src;
                $fotoVideoAnimeExt=explode('.',$fotoVideoAnime);
                $fotoVideoAnimeExt=end($fotoVideoAnimeExt);
                $fotoVideoAnimeFileName=md5($fotoVideoAnime).'.'.$fotoVideoAnimeExt;
                $cekFotoAnime= DB::table('anime')->where('foto','like','%'.$fotoVideoAnimeFileName)->first('foto');
                $cekVideoAnime= DB::table('video')->where('foto','like','%'.$fotoVideoAnimeFileName)->first('foto');
                if(!$cekFotoAnime OR !$cekVideoAnime){
                    $reqFotoAnime = new CurlHelper($fotoVideoAnime, "GET");
                    $reqFotoAnime->headers([
                    "Accept"=>"application/json"
                    ]);
                    $reqFotoAnime->userAgent($UA);
                    Storage::disk('scrap')->put(date('Y/m/d').'/'.$fotoVideoAnimeFileName, $reqFotoAnime->send());
                    $anime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoVideoAnimeFileName;
                }
                else if($cekFotoAnime)
                    $anime['foto']=$cekFotoAnime->foto;
                else if($cekVideoAnime)
                    $anime['foto']=$cekVideoAnime->foto;

                // Deskripsi Episode Video Anime
                $deskripsiVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('div.attachment-text',0)->plaintext;

                // Data Episode Video Anime Lengkap
                $videoAnime=array();
                $videoAnime['judul']=str_replace($anime['judul'],'',$item->plaintext);
                $videoAnime['judul_alternatif']=Str::slug($videoAnime['judul']);
                $videoAnime['tipe']='episode';
                $videoAnime['episode']=$episode--;
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
                // $this->info('+ [ Episode ] : '.$videoAnime['judul']);
                // sleep(1);
            }
            else
                $episode--;
            // else
            //     $this->info('   - [ SKIP Episode ] : '.str_replace($anime['judul'],'',$item->plaintext));
            $bar->advance();
        }
        $bar->finish();
        $this->info('');
        // LIST MOVIE ANIME
        $listMovieAnime = HTMLDomParser::str_get_html($responseAnime)->find('div.box-body.episode_list > table#table-movie > tbody > tr > td > a');
        $episode=count($listMovieAnime);
        $this->info('+ [ Scrap Movie Anime ]');
        $bar = $this->output->createProgressBar($episode);
        $bar->start();
        foreach($listMovieAnime as $item){
            // Cek Movie Video Anime
            $cekVideo= DB::table('video')->where('id_anime',$id_anime)->where('judul',$item->plaintext)->doesntExist();
            if($cekVideo){
                // CURL Movie Video Anime
                $urlvideo = $item->href;
                $reqVideo = new CurlHelper($urlvideo, "GET");
                $reqVideo->headers([
                    "Accept"=>"application/json"
                ]);
                $reqAnime->userAgent($UA);
                $responseVideo = $reqVideo->send();
                
                // Foto Movie Video Anime
                $fotoVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('img.attachment-img.poster',0)->src;
                $fotoVideoAnimeExt=explode('.',$fotoVideoAnime);
                $fotoVideoAnimeExt=end($fotoVideoAnimeExt);
                $fotoVideoAnimeFileName=md5($fotoVideoAnime).'.'.$fotoVideoAnimeExt;
                $cekFotoAnime= DB::table('anime')->where('foto','like','%'.$fotoVideoAnimeFileName)->first('foto');
                $cekVideoAnime= DB::table('video')->where('foto','like','%'.$fotoVideoAnimeFileName)->first('foto');
                if(!$cekFotoAnime OR !$cekVideoAnime){
                    $reqFotoAnime = new CurlHelper($fotoVideoAnime, "GET");
                    $reqFotoAnime->headers([
                    "Accept"=>"application/json"
                    ]);
                    $reqFotoAnime->userAgent($UA);
                    Storage::disk('scrap')->put(date('Y/m/d').'/'.$fotoVideoAnimeFileName, $reqFotoAnime->send());
                    $anime['foto']='storage/files/'.date('Y/m/d').'/'.$fotoVideoAnimeFileName;
                }
                else if($cekFotoAnime)
                    $anime['foto']=$cekFotoAnime->foto;
                else if($cekVideoAnime)
                    $anime['foto']=$cekVideoAnime->foto;

                // Deskripsi Movie Video Anime
                $deskripsiVideoAnime = HTMLDomParser::str_get_html($responseVideo)->find('div.attachment-text',0)->plaintext;

                // Data Movie Video Anime Lengkap
                $videoAnime=array();
                $videoAnime['judul']=$item->plaintext;
                $videoAnime['judul_alternatif']=Str::slug($videoAnime['judul']);
                $videoAnime['tipe']='movie';
                $videoAnime['episode']=$episode--;
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
                // $this->info('+ [ Movie ] : '.$videoAnime['judul']);
                // sleep(1);
                $bar->advance();
            }
            else
                $episode--;
            // else
            //     $this->info('   - [ SKIP Movie ] : '.$item->plaintext);
        }
        $bar->finish();
        $this->info('');
    }
    public function handle(){
        $linkAnime=DB::table('link_anime')->where('auto_update',1)->get();
        foreach($linkAnime as $item){
            try{
                $this->scrap($item->url);
            } catch (\Throwable $e) {
                report($e);
                $this->warn("\n!!! [ Anime ] ".$item->url);
            }
        }
        $this->info('=============== [ Selesai ] =============== ');
    }
}
