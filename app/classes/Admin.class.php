<?php
namespace Classes;

use Vendor\Security;
use Vendor\Database;

class Admin {
	
	protected $sql;
	protected $site = 1;
	
	public function __construct() {
		$this->sql = new Database;
	}
	
	public function isAuth(): bool {
		if (!array_key_exists('user', $_COOKIE) || !array_key_exists('pass', $_COOKIE)) {
			return false;
		}
		
		$user = strip_tags($_COOKIE['user']);
		$pass = strip_tags($_COOKIE['pass']);
		
		$getUser = $this->sql->fetch_array('SELECT * FROM admins WHERE user = \'' . $user . '\' AND usrtoken = \'' . $pass . '\' LIMIT 1;');
		
		return !empty($getUser[0]);
	}
	
	public function doLogout(): bool {
		foreach ($_COOKIE as $k => $v) {
			setcookie($k, null, -1, "/");
		}
		return true;
	}
	
	public function doLogin(string $user, string $pass) {
		$getUser = $this->sql->fetch_array('SELECT pass FROM admins WHERE user = \'' . $user . '\' LIMIT 1;');
		
		if (empty($getUser[0])) {
			return false;
		} else if (Security::encrypt($pass) === $getUser[0]['pass']) {
			$token = Security::random(85);
			$time  = strtotime('+3 months');
			
			setcookie("user", $user, $time, "/");
			setcookie("pass", $token, $time, "/");
			
			$this->sql->update('admins', ['usrtoken' => $token], ['user' => $user]);
			
			return (object) $getUser[0];
		}
		return false;
	}
	
	public function getTotal(string $field): int {
		$total = $this->sql->fetch_array('SELECT id FROM ' . $field . ';');
		return count($total);
	}
	
	public function ImgDel(string $img) {
		if (!$img) {
			return false;
		}
		$img = $this->sql->query('delete from pages where id = \'' . $img . '\';');
		return (object) $img;
	}
	
	public function getConfig(string $field): string {
		return $this->sql->fetch_array('SELECT ' . $field . ' FROM config WHERE id = \'' . $this->site . '\';')[0][$field];
	}
	
	public function setConfig(array $toUpdate) {
		return $this->sql->update('config', $toUpdate, ['id' => $this->site]);
	}
	
	public function InsertData(string $table, array $parameters) {
		$this->sql->insert($table,$parameters);
	}
	
	public function ipAddr(): string {
		return array_key_exists("HTTP_CF_CONNECTING_IP", $_SERVER) 
			? $_SERVER["HTTP_CF_CONNECTING_IP"] 
			: $_SERVER['REMOTE_ADDR'];
	}
}
