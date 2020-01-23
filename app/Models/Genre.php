<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Genre extends Model
{
    public static $tableName = "genre";

    public static $connection = "mysql";

    
	private $id;
	private $nama;
	private $created_at;
	private $updated_at;
	private $nama_alternatif;


    
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

	public static function findAllByNamaAlternatif($value) {
		return static::simpleQuery()->where('nama_alternatif',$value)->get();
	}

	public static function findByNamaAlternatif($value) {
		return static::findBy('nama_alternatif',$value);
	}

	public function getNamaAlternatif() {
		return $this->nama_alternatif;
	}

	public function setNamaAlternatif($nama_alternatif) {
		$this->nama_alternatif = $nama_alternatif;
	}


}