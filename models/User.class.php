<?php

class User{

	private $id;
	private $name;
	private $password;
	private $email;
	private $level;
	private $avatar;
	private $description;
	private $admin;
	private $moderator;
	private $login;
	


	public function __construct(){

	$this->setId($this->id);
	$this->setName($this->name);
	$this->setPassword($this->password);
	$this->setEmail($this->email);
	$this->setLevel($this->level);
	$this->setAvatar($this->avatar);
	$this->setDescription($this->description);
	$this->setLogin($this->login);

	}

	Public function getId(){

		return $this->id;
	}
	public function setId($id){

		$this->id = $id;
	}


	Public function getName(){

		return $this->name;
	}
	public function setName($name){

		$this->name = $name;
	}

	Public function getPassword(){

		return $this->password;
	}
	public function setPassword($password){

		$this->password = $password;
	}

	Public function getEmail(){

		return $this->email;
	}
	public function setEmail($email){

		$this->email = $email;
	}


	public function verifPassword($password){

		if(password_verify($password, $this->password)){
			return true; 
		}
		else{
			return false;
		}

	}

	public function getLogin(){

		return $this->login;
	}

	public function setLogin($login){

		$this->login = $login;
	}

	public function isAdmin(){

		return $this->admin;

	}

	public function isModerator(){

		return $this->moderator;

	}

	Public function getLevel(){

		return $this->level;
	}
	public function setLevel($level){

		$this->level = $level;
	}

	Public function getAvatar(){

		return $this->avatar;
	}
	public function setAvatar($avatar){

		$this->avatar = $avatar;
	}

	Public function getDescription(){

		return $this->description;
	}
	public function setDescription($description){

		$this->description = $description;
	}

}


?>