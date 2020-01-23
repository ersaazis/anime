<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Counter extends Model
{
    public static $tableName = "counter";

    public static $connection = "mysql";

    
	private $id;
	private $id_users;
	private $id_video;
	private $id_genre;
	private $id_anime;
	private $tanggal;
	private $counter;
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

	public static function findByIdUsers($value) {
		return static::findBy('id_users',$value);
	}

	public function getIdUsers() {
		return $this->id_users;
	}

	public function setIdUsers($id_users) {
		$this->id_users = $id_users;
	}

	public static function findAllByIdVideo($value) {
		return static::simpleQuery()->where('id_video',$value)->get();
	}

	public static function findByIdVideo($value) {
		return static::findBy('id_video',$value);
	}

	public function getIdVideo() {
		return $this->id_video;
	}

	public function setIdVideo($id_video) {
		$this->id_video = $id_video;
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

	public static function findAllByIdAnime($value) {
		return static::simpleQuery()->where('id_anime',$value)->get();
	}

	public static function findByIdAnime($value) {
		return static::findBy('id_anime',$value);
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

	public static function findAllByTanggal($value) {
		return static::simpleQuery()->where('tanggal',$value)->get();
	}

	public static function findByTanggal($value) {
		return static::findBy('tanggal',$value);
	}

	public function getTanggal() {
		return $this->tanggal;
	}

	public function setTanggal($tanggal) {
		$this->tanggal = $tanggal;
	}

	public static function findAllByCounter($value) {
		return static::simpleQuery()->where('counter',$value)->get();
	}

	public static function findByCounter($value) {
		return static::findBy('counter',$value);
	}

	public function getCounter() {
		return $this->counter;
	}

	public function setCounter($counter) {
		$this->counter = $counter;
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