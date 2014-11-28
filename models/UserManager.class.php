<?php 
class UserManager{
	private $db;

	public function __construct($db){
		$this->db=$db;
	}

	public function register($name,$email,$password,$password2){
		if($password==$password2){
			if (strlen($name) < 4){
				return 'Login trop court';
			}
			else if (strlen($password) < 4){
				return 'Mot de passe trop court';
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				return 'email invalide';
			}
			else{
				$name = mysqli_real_escape_string($this->db, $name);
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=>14]);

				$verif=mysqli_query($this->db, "SELECT name, password, email FROM user WHERE name='".$name."'");
				$result=mysqli_num_rows($verif);
				if($result==0){
					$request=mysqli_query($this->db,"INSERT INTO user (name, password, email) VALUES ('".$name."', '".$password."', '".$email."')");
					$res=mysqli_query($this->db, "SELECT name, password, email FROM user WHERE name='".$name."'AND password='".$password."' AND email='".$email."'");

					if($res){
						$user=mysqli_fetch_object($res, "User");
						if($user){
							return $user;
						}
					}
					exit();
				}
				else{
					return "Le login est déjà pris";
				}
			}
		}
		else{
			return "Les mots de passe ne correspondent pas";
		}
	}

	public function login($name,$password){
		$name= mysqli_real_escape_string($this->db, $name);

		$res=mysqli_query($this->db, "SELECT id, name, password, level, avatar, description FROM user WHERE name='".$name."'");

		if($res){
			$user=mysqli_fetch_object($res,"User");
			if($user){
				if($user->verifPassword($password)){
					return $user;
				}
				else{
					return "Mot de passe incorrect";
				}
			}
			else return "Votre identifiant ne correspond pas";
		}
		else{
			return "Erreur interne";
		}
	}

	public function getUser($id){
		$res=mysqli_query($this->db, "SELECT id, name, password, email, level, avatar, description, creation_date FROM user WHERE id='".$id."'");
		if($res){
			$user=mysqli_fetch_object($res, "User");
			if($user){
				return $user;
			}
		}

	}

	public function changeAvatar($avatar,$name){

		if(filter_var($avatar, FILTER_VALIDATE_URL)){
			$request=mysqli_query($this->db, "UPDATE `forum`.`user` SET avatar='".$avatar."' WHERE user.name='".$name."'");
			if($request){
				return "Avatar ajouté";
			}
			else{
				return "Erreur lors de l'ajout de l'avatar";
			}
		}
		else{
			return "L'url saisie n'est pas valide";
		}
	}


	

/*
	public function modifyUser($id, $name, $email, $description, $oldPassword, $newPassword, $newPassword2){

		echo "je suis là";
		if (strlen($name) < 4){
			return 'Login trop court';
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return 'email invalide';
		}
		else if(isset($name, $email, $description){
			$name = mysqli_real_escape_string($this->db, $name);

			$verif=mysqli_query($this->db, "SELECT name FROM user WHERE name='".$name."'");
			$result=mysqli_num_rows($verif);

			if($result==0){

				$request=mysqli_query($this->db, "UPDATE `forum`.`user` SET name='".$name."', email='".$email."', description='".$description."' WHERE user.id='".$id."'");

				$res=mysqli_query($this->db, "SELECT name, email FROM user WHERE name='".$name."' AND email='".$email."'");

				if($res){
					$user=mysqli_fetch_object($res, "User");
					if($user){
						return $user;
					}
				}
				exit();
			}
			else{
				return "Le login est déjà pris";
			}
		}		

		if(isset($oldPassword, $newPassword, $newPassword2) && $oldPassword!="" && $newPassword!="" && $newPassword2!=""){
			$password=mysqli_query($this->db, "SELECT password FROM user WHERE name='".$name."'");
			if($oldPassword==$res){
				if($newPassword==$newPassword2){
					if (strlen($newPassword) < 4){
						return 'Mot de passe trop court';
					}
					else{
						$newPassword = password_hash($newPassword, PASSWORD_BCRYPT, ['cost'=>14]);
						$res=mysqli_query($this->db, "UPDATE `forum`.`user` SET password='".$newPassword."'");
					}
				}
				else{
					return "Les nouveaux mots de passe saisies ne corrrespondent pas";
				}
			}
			else{
				return "Vous vous êtes trompé dans la saisie de votre mot de passe";
			}

	}*/



}
?>