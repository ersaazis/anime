<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Pengumuman extends Model
{
    public static $tableName = "pengumuman";

    public static $connection = "mysql";

    
	private $id;
	private $judul;
	private $isi;
	private $tanggal_expire;
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

	public static function findAllByIsi($value) {
		return static::simpleQuery()->where('isi',$value)->get();
	}

	public static function findByIsi($value) {
		return static::findBy('isi',$value);
	}

	public function getIsi() {
		return $this->isi;
	}

	public function setIsi($isi) {
		$this->isi = $isi;
	}

	public static function findAllByTanggalExpire($value) {
		return static::simpleQuery()->where('tanggal_expire',$value)->get();
	}

	public static function findByTanggalExpire($value) {
		return static::findBy('tanggal_expire',$value);
	}

	public function getTanggalExpire() {
		return $this->tanggal_expire;
	}

	public function setTanggalExpire($tanggal_expire) {
		$this->tanggal_expire = $tanggal_expire;
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