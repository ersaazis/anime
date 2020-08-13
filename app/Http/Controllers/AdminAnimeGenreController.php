<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminAnimeGenreController extends CBController {


    public function cbInit()
    {
        $this->setTable("anime_genre");
        $this->setPermalink("anime_genre");
        $this->setPageTitle("Anime Genre");

        $this->addSelectTable("Anime","id_anime",["table"=>"anime","value_option"=>"id","display_option"=>"judul","sql_condition"=>""]);
		$this->addSelectTable("Genre","id_genre",["table"=>"genre","value_option"=>"id","display_option"=>"nama","sql_condition"=>""]);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
