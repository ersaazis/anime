<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;

class AdminPengumumanController extends CBController {


    public function cbInit()
    {
        $this->setTable("pengumuman");
        $this->setPermalink("pengumuman");
        $this->setPageTitle("Pengumuman");

        $this->addText("Judul","judul")->strLimit(150)->maxLength(255);
		$this->addWysiwyg("Isi","isi")->strLimit(150);
		$this->addDate("Tanggal Expire","tanggal_expire")->format("yy-m-d");
		$this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		$this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
		

    }
}
