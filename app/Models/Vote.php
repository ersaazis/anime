<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Vote extends Model
{
    public static $tableName = "vote";

    public static $connection = "mysql";

    
	private $id;
	private $id_users;
	private $id_karakter;
	private $id_anime;
	private $created_at;
	private $updated_at;


    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public static function findAllByIdUsers($value) {
		return static::simpleQuery()->where('id_users',$value)->get();
	}

	/**
	* @return Users
	*/
	public function getIdUsers() {
		return Users::findById($this->id_users);
	}

	public function setIdUsers($id_users) {
		$this->id_users = $id_users;
	}

	public static function findAllByIdKarakter($value) {
		return static::simpleQuery()->where('id_karakter',$value)->get();
	}

	/**
	* @return Karakter
	*/
	public function getIdKarakter() {
		return Karakter::findById($this->id_karakter);
	}

	public function setIdKarakter($id_karakter) {
		$this->id_karakter = $id_karakter;
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