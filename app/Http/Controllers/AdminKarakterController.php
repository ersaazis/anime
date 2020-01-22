<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminKarakterController extends CBController {


    public function cbInit()
    {
        $this->setTable("karakter");
        $this->setPermalink("karakter");
        $this->setPageTitle("Karakter");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		$this->addImage("Foto","foto")->encrypt(true);
		$this->addWysiwyg("Deskripsi","deskripsi")->strLimit(150);
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
