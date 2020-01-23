<?php namespace App\Http\Controllers;

use crocodicstudio\crudbooster\controllers\CBController;
use Illuminate\Support\Str;

class AdminGenreController extends CBController {


    public function cbInit()
    {
        $this->setTable("genre");
        $this->setPermalink("genre");
        $this->setPageTitle("Genre");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
        $this->addDatetime("Created At","created_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
        $this->addDatetime("Updated At","updated_at")->required(false)->showIndex(false)->showAdd(false)->showEdit(false);
        $this->addSubModule("Anime", AdminAnimeGenreController::class, "id_genre", function ($row) {
          return [
            "ID"=> $row->primary_key, // You can get the id of table by using primary_key object
            "Nama"=> $row->nama
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
