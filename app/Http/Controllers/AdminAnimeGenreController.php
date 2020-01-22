<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminAnimeGenreController extends CBController {


    public function cbInit()
    {
        $this->setTable("anime_genre");
        $this->setPermalink("anime_genre");
        $this->setPageTitle("Genre Anime");

        $this->addSelectTable("Anime","id_anime",["table"=>"anime","value_option"=>"id","display_option"=>"judul","sql_condition"=>""]);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
