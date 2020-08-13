<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminKarakterAnimeController extends CBController {


    public function cbInit()
    {
        $this->setTable("karakter_anime");
        $this->setPermalink("karakter_anime");
        $this->setPageTitle("Karakter Anime");

        $this->addSelectTable("Anime","id_anime",["table"=>"anime","value_option"=>"id","display_option"=>"judul","sql_condition"=>""]);
		$this->addSelectTable("Karakter","id_karakter",["table"=>"karakter","value_option"=>"id","display_option"=>"nama","sql_condition"=>""]);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
