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
	private $db;
	


	public function __construct($db){
		$this->db = $db;
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

		if (strlen($name) < 4)
			return "trop court !";
		else
			$this->name = $name;
	}

	public function getPassword(){

		return $this->password;
	}

	public function editPassword($oldPassword, $newPassword, $newPassword2)
	{

		$password=mysqli_query($this->db, "SELECT password FROM user WHERE id='".$this->getId()."'");
		if($password)
		{
			$password=mysqli_fetch_assoc($password);
			if($this->verifPassword($password))
			{
				if($newPassword==$newPassword2)
				{
					if (strlen($newPassword) < 4)
					{
						return 'Mot de passe trop court';
					}
					else
					{
						$newPassword = password_hash($newPassword, PASSWORD_BCRYPT, ['cost'=>14]);
						$res = mysqli_query($this->db, "UPDATE `forum`.`user` SET password='".$newPassword."' WHERE id='".$this->getId()."'");
						return 'Mot de passe modifié avec succès';
					}
				}
				else{
					return "Les nouveaux mots de passe saisies ne corrrespondent pas";
				}
			}
			else{
				return "Vous vous êtes trompé dans la saisie de votre mot de passe";
			}
		}
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