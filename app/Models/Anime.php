<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Anime extends Model
{
    public static $tableName = "anime";

    public static $connection = "mysql";

    
	private $id;
	private $judul;
	private $judul_alternatif;
	private $rating;
	private $voter;
	private $status;
	private $total_episode;
	private $hari_tayang;
	private $foto;
	private $created_at;
	private $updated_at;


    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public static function findAllByJudul($value) {
		return static::simpleQuery()->where('judul',$value)->get();
	}

	public static function findByJudul($value) {
		return static::findBy('judul',$value);
	}

	public function getJudul() {
		return $this->judul;
	}

	public function setJudul($judul) {
		$this->judul = $judul;
	}

	public static function findAllByJudulAlternatif($value) {
		return static::simpleQuery()->where('judul_alternatif',$value)->get();
	}

	public static function findByJudulAlternatif($value) {
		return static::findBy('judul_alternatif',$value);
	}

	public function getJudulAlternatif() {
		return $this->judul_alternatif;
	}

	public function setJudulAlternatif($judul_alternatif) {
		$this->judul_alternatif = $judul_alternatif;
	}

	public static function findAllByRating($value) {
		return static::simpleQuery()->where('rating',$value)->get();
	}

	public static function findByRating($value) {
		return static::findBy('rating',$value);
	}

	public function getRating() {
		return $this->rating;
	}

	public function setRating($rating) {
		$this->rating = $rating;
	}

	public static function findAllByVoter($value) {
		return static::simpleQuery()->where('voter',$value)->get();
	}

	public static function findByVoter($value) {
		return static::findBy('voter',$value);
	}

	public function getVoter() {
		return $this->voter;
	}

	public function setVoter($voter) {
		$this->voter = $voter;
	}

	public static function findAllByStatus($value) {
		return static::simpleQuery()->where('status',$value)->get();
	}

	public static function findByStatus($value) {
		return static::findBy('status',$value);
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
	}

	public static function findAllByTotalEpisode($value) {
		return static::simpleQuery()->where('total_episode',$value)->get();
	}

	public static function findByTotalEpisode($value) {
		return static::findBy('total_episode',$value);
	}

	public function getTotalEpisode() {
		return $this->total_episode;
	}

	public function setTotalEpisode($total_episode) {
		$this->total_episode = $total_episode;
	}

	public static function findAllByHariTayang($value) {
		return static::simpleQuery()->where('hari_tayang',$value)->get();
	}

	public static function findByHariTayang($value) {
		return static::findBy('hari_tayang',$value);
	}

	public function getHariTayang() {
		return $this->hari_tayang;
	}

	public function setHariTayang($hari_tayang) {
		$this->hari_tayang = $hari_tayang;
	}

	public static function findAllByFoto($value) {
		return static::simpleQuery()->where('foto',$value)->get();
	}

	public static function findByFoto($value) {
		return static::findBy('foto',$value);
	}

	public function getFoto() {
		return $this->foto;
	}

	public function setFoto($foto) {
		$this->foto = $foto;
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