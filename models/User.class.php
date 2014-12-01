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
	private $creation_date;
	


	public function __construct(){

	}

	public function getId(){

		return $this->id;
	}
	public function setId($id){

		$this->id = $id;
	}


	public function getName(){

		return $this->name;
	}
	public function setName($name){

		$this->name = $name;
	}

	public function getPassword(){

		return $this->password;
	}
	public function setPassword($password){

		$this->password = $password;
	}

	public function getEmail(){

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

	public function isAdmin(){

		return $this->level == "admin";

	}

	public function isModerator(){

		return $this->level == "moderator";

	}
	
	public function getLevel(){

		return $this->level;
	}
	public function setLevel($level){

		$this->level = $level;
	}

	public function getAvatar(){

		return $this->avatar;
	}
	public function setAvatar($avatar){

		$this->avatar = $avatar;
	}

	public function getDescription(){

		return $this->description;
	}
	public function setDescription($description){

		$this->description = $description;
	}

	public function getCreationDate(){

		return $this->creation_date;
	}
	public function setCreationDate($creation_date){

		$this->creation_date = $creation_date;
	}

}


?>