<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Video extends Model
{
    public static $tableName = "video";

    public static $connection = "mysql";

    
	private $id;
	private $judul;
	private $tipe;
	private $episode;
	private $foto;
	private $deskripsi;
	private $server1;
	private $server2;
	private $server3;
	private $server4;
	private $jum_report;
	private $id_anime;
	private $created_at;
	private $updated_at;
	private $judul_alternatif;


    
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

	public static function findAllByTipe($value) {
		return static::simpleQuery()->where('tipe',$value)->get();
	}

	public static function findByTipe($value) {
		return static::findBy('tipe',$value);
	}

	public function getTipe() {
		return $this->tipe;
	}

	public function setTipe($tipe) {
		$this->tipe = $tipe;
	}

	public static function findAllByEpisode($value) {
		return static::simpleQuery()->where('episode',$value)->get();
	}

	public static function findByEpisode($value) {
		return static::findBy('episode',$value);
	}

	public function getEpisode() {
		return $this->episode;
	}

	public function setEpisode($episode) {
		$this->episode = $episode;
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

	public static function findAllByDeskripsi($value) {
		return static::simpleQuery()->where('deskripsi',$value)->get();
	}

	public static function findByDeskripsi($value) {
		return static::findBy('deskripsi',$value);
	}

	public function getDeskripsi() {
		return $this->deskripsi;
	}

	public function setDeskripsi($deskripsi) {
		$this->deskripsi = $deskripsi;
	}

	public static function findAllByServer1($value) {
		return static::simpleQuery()->where('server1',$value)->get();
	}

	public static function findByServer1($value) {
		return static::findBy('server1',$value);
	}

	public function getServer1() {
		return $this->server1;
	}

	public function setServer1($server1) {
		$this->server1 = $server1;
	}

	public static function findAllByServer2($value) {
		return static::simpleQuery()->where('server2',$value)->get();
	}

	public static function findByServer2($value) {
		return static::findBy('server2',$value);
	}

	public function getServer2() {
		return $this->server2;
	}

	public function setServer2($server2) {
		$this->server2 = $server2;
	}

	public static function findAllByServer3($value) {
		return static::simpleQuery()->where('server3',$value)->get();
	}

	public static function findByServer3($value) {
		return static::findBy('server3',$value);
	}

	public function getServer3() {
		return $this->server3;
	}

	public function setServer3($server3) {
		$this->server3 = $server3;
	}

	public static function findAllByServer4($value) {
		return static::simpleQuery()->where('server4',$value)->get();
	}

	public static function findByServer4($value) {
		return static::findBy('server4',$value);
	}

	public function getServer4() {
		return $this->server4;
	}

	public function setServer4($server4) {
		$this->server4 = $server4;
	}

	public static function findAllByJumReport($value) {
		return static::simpleQuery()->where('jum_report',$value)->get();
	}

	public static function findByJumReport($value) {
		return static::findBy('jum_report',$value);
	}

	public function getJumReport() {
		return $this->jum_report;
	}

	public function setJumReport($jum_report) {
		$this->jum_report = $jum_report;
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


}