<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Musim extends Model
{
    public static $tableName = "musim";

    public static $connection = "mysql";

    
	private $id;
	private $nama;
	private $tahun;
	private $created_at;
	private $updated_at;


    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public static function findAllByNama($value) {
		return static::simpleQuery()->where('nama',$value)->get();
	}

	public static function findByNama($value) {
		return static::findBy('nama',$value);
	}

	public function getNama() {
		return $this->nama;
	}

	public function setNama($nama) {
		$this->nama = $nama;
	}

	public static function findAllByTahun($value) {
		return static::simpleQuery()->where('tahun',$value)->get();
	}

	public static function findByTahun($value) {
		return static::findBy('tahun',$value);
	}

	public function getTahun() {
		return $this->tahun;
	}

	public function setTahun($tahun) {
		$this->tahun = $tahun;
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