<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class AnimeGenre extends Model
{
    public static $tableName = "anime_genre";

    public static $connection = "mysql";

    
	private $id;
	private $id_anime;
	private $id_genre;
	private $created_at;
	private $updated_at;


    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public static function findAllByIdAnime($value) {
		return static::simpleQuery()->where('id_anime',$value)->get();
	}

	/**
	* @return Anime
	*/
	public function getIdAnime() {
		return Anime::findById($this->id_anime);
	}

	public function setIdAnime($id_anime) {
		$this->id_anime = $id_anime;
	}

	public static function findAllByIdGenre($value) {
		return static::simpleQuery()->where('id_genre',$value)->get();
	}

	public static function findByIdGenre($value) {
		return static::findBy('id_genre',$value);
	}

	public function getIdGenre() {
		return $this->id_genre;
	}

	public function setIdGenre($id_genre) {
		$this->id_genre = $id_genre;
	}

	public static function findAllByCreatedAt($value) {
		return static::simpleQuery()->where('created_at',$value)->get();
	}

	public static function findByCreatedAt($value) {
		return static::findBy('created_at',$value);
	}

	public function getCreatedAt() {
		return $this->created_at;
	}

	public function setCreatedAt($created_at) {
		$this->created_at = $created_at;
	}

	public static function findAllByUpdatedAt($value) {
		return static::simpleQuery()->where('updated_at',$value)->get();
	}

	public static function findByUpdatedAt($value) {
		return static::findBy('updated_at',$value);
	}

	public function getUpdatedAt() {
		return $this->updated_at;
	}

	public function setUpdatedAt($updated_at) {
		$this->updated_at = $updated_at;
	}


}