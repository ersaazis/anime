<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;
use App\Models\AnimeGenre;
use App\Models\Genre;
use Illuminate\Support\Str;

class AdminAnimeController extends CBController {


    public function cbInit()
    {
        $this->setTable("anime");
        $this->setPermalink("anime");
        $this->setPageTitle("Anime");

		$this->addText("Judul","judul")->strLimit(150)->maxLength(255);
		$this->addWysiwyg("Deskripsi","deskripsi")->showIndex(false);
		$this->addNumber("Rating","rating")->required(false)->showAdd(false)->showEdit(false);
		$this->addNumber("Voter","voter")->required(false)->showAdd(false)->showEdit(false);
		$this->addSelectOption("Status","status")->options(['ended'=>'Ended','ongoing'=>'Ongoing']);
		$this->addNumber("Total Episode","total_episode")->required(false);
		$this->addSelectOption("Hari Tayang","hari_tayang")->options(['senin'=>'Senin','selasa'=>'Selasa','rabu'=>'Rabu','kamis'=>'Kamis','jumat'=>'Ju\'mat','sabtu'=>'Sabtu','minggu'=>'Minggu']);
		$this->addImage("Foto","foto")->encrypt(true);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addSubModule("Genre", AdminAnimeGenreController::class, "id_anime", function ($row) {
			return [
			  "ID"=> $row->primary_key, // You can get the id of table by using primary_key object
			  "Judul"=> $row->judul
			];
		});
		$this->addSubModule("Video", AdminVideoController::class, "id_anime", function ($row) {
			return [
			  "ID"=> $row->primary_key, // You can get the id of table by using primary_key object
			  "Judul"=> $row->judul
			];
		});
		$this->addSubModule("Karakter", AdminKarakterAnimeController::class, "id_anime", function ($row) {
			return [
			  "ID"=> $row->primary_key, // You can get the id of table by using primary_key object
			  "Judul"=> $row->judul
			];
		});
		$this->addText("Genre",'id','id')->required(false)->showAdd(false)->showEdit(false)->indexDisplayTransform(function($row) {
			$genres=AnimeGenre::findAllByIdAnime($row);
			$genre=null;
			foreach($genres as $g){
				$genre.=Genre::findById($g->id_genre)->getNama().", ";
			}
			return $genre;
		});
		$this->hookBeforeInsert(function($data) {
			$data['judul_alternatif'] = Str::slug($data['judul'],'-');
			return $data;
		});
		$this->hookBeforeUpdate(function($data) {
			$data['judul_alternatif'] = Str::slug($data['judul'],'-');
			return $data;
		});
    }
}
