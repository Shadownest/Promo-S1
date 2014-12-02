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
					$res=mysqli_query($this->db, "SELECT id, name, password, email FROM user WHERE name='".$name."'AND password='".$password."' AND email='".$email."'");

					if($res){
						$user=mysqli_fetch_object($res, "User");
						if($user){
							$feed = new FeedManager($this->db);
							$feed->createUser($user);
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

	public function getAvatar($id){

		$request= "SELECT  `id`, `name`, `password`, `email`, `level`, `avatar`, `description`, `creation_date` FROM user  WHERE id='".$id."' ";
		var_dump($request);

		$res=mysqli_query($this->db, $request);

		if($res)
		{
			$user=mysqli_fetch_object($res,"User");
			if ($user)
			{
				$avatar=$user->avatar;

				return $avatar;
			}
			
		}
				
	}


	public function modifyUser($id, $name, $email, $description)
	{
		$name= mysqli_real_escape_string($this->db, $name);
		if (strlen($name) < 4){
			return 'Login trop court';
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return 'email invalide';
		}
		else{
			$description= mysqli_real_escape_string($this->db, $description);
			$request=mysqli_query($this->db, "UPDATE `forum`.`user` SET name='".$name."', email='".$email."', description='".$description."' WHERE user.id='".$id."'");
			return 'Informations personnelles mise à jours';
		}		
	}

	public function modifyPasswordUser($id, $oldPassword, $newPassword, $newPassword2)
	{
		$password=mysqli_query($this->db, "SELECT password FROM user WHERE id='".$id."'");

		if($password){
			$user=mysqli_fetch_object($password,"User");

			if($user->verifPassword($oldPassword)){
				if($newPassword==$newPassword2){
					if (strlen($newPassword) < 4){
						return 'Mot de passe trop court';
					}
					else{
						$newPassword = password_hash($newPassword, PASSWORD_BCRYPT, ['cost'=>14]);
						$res=mysqli_query($this->db, "UPDATE `forum`.`user` SET password='".$newPassword."' WHERE id='".$id."'");
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

	// -------------------------- UPC Admin -----------------------------------------------


	// affichage de l'utilisateur suceptible à supprimer
	public function displayUser(){

	$res=mysqli_query($this->db, "SELECT id, name, date_creation, level FROM user WHERE name='".$name."'");
	return $res;
	}


	//mise à jour du compte utilisateur : moderation ou non


	public function checkName($term){

	$res=mysqli_query($this->db, "SELECT name FROM user WHERE name LIKE %'".$term."'%");
	return $res;

	} 


	//suprimer un compte utilisateur


	public function deleteUser(){

	mysqli_query($this->db, "DELETE `user` WHERE id='".$id."' ");
	header("Location: index.php?page=ucp_admin");
	exit();

	}
}
?>