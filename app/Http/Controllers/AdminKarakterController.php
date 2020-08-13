<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;
use Illuminate\Support\Str;

class AdminKarakterController extends CBController {


    public function cbInit()
    {
        $this->setTable("karakter");
        $this->setPermalink("karakter");
        $this->setPageTitle("Karakter");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		$this->addImage("Foto","foto")->encrypt(true);
		$this->addNumber("Voter","voter")->required(false)->showAdd(false)->showEdit(false);
		$this->addWysiwyg("Deskripsi","deskripsi")->showIndex(false);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
        $this->addSubModule("Anime", AdminKarakterAnimeController::class, "id_karakter", function ($row) {
			return [
			  "ID"=> $row->primary_key, // You can get the id of table by using primary_key object
			  "Nama Karakter"=> $row->nama
			];
		});
		$this->hookBeforeInsert(function($data) {
			$data['nama_alternatif'] = Str::slug($data['nama'],'-');
			return $data;
		});
		$this->hookBeforeUpdate(function($data) {
			$data['nama_alternatif'] = Str::slug($data['nama'],'-');
			return $data;
		});
    }
}
