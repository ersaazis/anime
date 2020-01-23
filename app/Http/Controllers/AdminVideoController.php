<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;
use Illuminate\Support\Str;

class AdminVideoController extends CBController {


    public function cbInit()
    {
        $this->setTable("video");
        $this->setPermalink("video");
        $this->setPageTitle("Video");

        $this->addText("Judul","judul")->strLimit(150)->maxLength(255);
		$this->addSelectOption("Tipe","tipe")->options(['episode'=>'Episode','movie'=>'Movie']);
		$this->addNumber("Episode","episode");
		$this->addImage("Foto","foto")->encrypt(true);
		$this->addWysiwyg("Deskripsi","deskripsi")->strLimit(150);
		$this->addText("Server1","server1")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addText("Server2","server2")->showIndex(false)->required(false)->strLimit(150)->maxLength(255);
		$this->addText("Server3","server3")->showIndex(false)->required(false)->strLimit(150)->maxLength(255);
		$this->addText("Server4","server4")->showIndex(false)->required(false)->strLimit(150)->maxLength(255);
		$this->addNumber("Jum Report","jum_report")->required(false)->showAdd(false)->showEdit(false);
		$this->addSelectTable("Anime","id_anime",["table"=>"anime","value_option"=>"id","display_option"=>"judul","sql_condition"=>""]);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
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
