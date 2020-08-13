<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminMusimController extends CBController {


    public function cbInit()
    {
        $this->setTable("musim");
        $this->setPermalink("musim");
        $this->setPageTitle("Musim");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		$this->addNumber("Tahun","tahun");
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
