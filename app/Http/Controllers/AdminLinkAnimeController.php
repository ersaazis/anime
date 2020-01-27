<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminLinkAnimeController extends CBController {


    public function cbInit()
    {
        $this->setTable("link_anime");
        $this->setPermalink("link_anime");
        $this->setPageTitle("Link Anime");

		$this->addText("Judul","judul")->strLimit(150)->maxLength(255);
        $this->addText("Url","url")->strLimit(150)->maxLength(255);
		$this->addRadio("Auto Update","auto_update")->options([0=>'Tidak',1=>'Ya']);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
