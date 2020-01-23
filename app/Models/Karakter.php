<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Karakter extends Model
{
    public static $tableName = "karakter";

    public static $connection = "mysql";

    
	private $id;
	private $nama;
	private $foto;
	private $deskripsi;
	private $created_at;
	private $updated_at;
	private $voter;


    
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


}