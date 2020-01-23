<?php
namespace App\Models;

use DB;
use Crocodicstudio\Cbmodel\Core\Model;

class Users extends Model
{
    public static $tableName = "users";

    public static $connection = "mysql";

    
	private $id;
	private $name;
	private $email;
	private $email_verified_at;
	private $password;
	private $remember_token;
	private $created_at;
	private $updated_at;
	private $photo;
	private $cb_roles_id;
	private $ip_address;
	private $user_agent;
	private $login_at;


    
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public static function findAllByName($value) {
		return static::simpleQuery()->where('name',$value)->get();
	}

	public static function findByName($value) {
		return static::findBy('name',$value);
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public static function findAllByEmail($value) {
		return static::simpleQuery()->where('email',$value)->get();
	}

	public static function findByEmail($value) {
		return static::findBy('email',$value);
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}

	public static function findAllByEmailVerifiedAt($value) {
		return static::simpleQuery()->where('email_verified_at',$value)->get();
	}

	public static function findByEmailVerifiedAt($value) {
		return static::findBy('email_verified_at',$value);
	}

	public function getEmailVerifiedAt() {
		return $this->email_verified_at;
	}

	public function setEmailVerifiedAt($email_verified_at) {
		$this->email_verified_at = $email_verified_at;
	}

	public static function findAllByPassword($value) {
		return static::simpleQuery()->where('password',$value)->get();
	}

	public static function findByPassword($value) {
		return static::findBy('password',$value);
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public static function findAllByRememberToken($value) {
		return static::simpleQuery()->where('remember_token',$value)->get();
	}

	public static function findByRememberToken($value) {
		return static::findBy('remember_token',$value);
	}

	public function getRememberToken() {
		return $this->remember_token;
	}

	public function setRememberToken($remember_token) {
		$this->remember_token = $remember_token;
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

	public static function findAllByPhoto($value) {
		return static::simpleQuery()->where('photo',$value)->get();
	}

	public static function findByPhoto($value) {
		return static::findBy('photo',$value);
	}

	public function getPhoto() {
		return $this->photo;
	}

	public function setPhoto($photo) {
		$this->photo = $photo;
	}

	public static function findAllByCbRolesId($value) {
		return static::simpleQuery()->where('cb_roles_id',$value)->get();
	}

	public static function findByCbRolesId($value) {
		return static::findBy('cb_roles_id',$value);
	}

	public function getCbRolesId() {
		return $this->cb_roles_id;
	}

	public function setCbRolesId($cb_roles_id) {
		$this->cb_roles_id = $cb_roles_id;
	}

	public static function findAllByIpAddress($value) {
		return static::simpleQuery()->where('ip_address',$value)->get();
	}

	public static function findByIpAddress($value) {
		return static::findBy('ip_address',$value);
	}

	public function getIpAddress() {
		return $this->ip_address;
	}

	public function setIpAddress($ip_address) {
		$this->ip_address = $ip_address;
	}

	public static function findAllByUserAgent($value) {
		return static::simpleQuery()->where('user_agent',$value)->get();
	}

	public static function findByUserAgent($value) {
		return static::findBy('user_agent',$value);
	}

	public function getUserAgent() {
		return $this->user_agent;
	}

	public function setUserAgent($user_agent) {
		$this->user_agent = $user_agent;
	}

	public static function findAllByLoginAt($value) {
		return static::simpleQuery()->where('login_at',$value)->get();
	}

	public static function findByLoginAt($value) {
		return static::findBy('login_at',$value);
	}

	public function getLoginAt() {
		return $this->login_at;
	}

	public function setLoginAt($login_at) {
		$this->login_at = $login_at;
	}


}