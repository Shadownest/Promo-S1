<?php

if(isset($_POST["name"]) && isset($_POST["password"]))
{
	$manager=new UserManager($db);
	$user=$manager->login($_POST["name"], $_POST["password"]);

	if (gettype($user) != "string"){
		$_SESSION['id'] = $user->getId();
		$_SESSION['admin'] = $user->isAdmin();
		$_SESSION['moderator'] = $user->isModerator();
		$_SESSION['name'] = $user->getName();
		$_SESSION['avatar'] = $user->getAvatar();
		$_SESSION['email'] = $user->getEmail();
		$_SESSION['description'] = $user->getDescription();

		if ($_SESSION['admin']){
			header("Location: index.php?page=ucp_admin");
		}
		else{
			header("Location: index.php?page=ucp_user");
		}
		exit();
	}
	else{
		$error = $user;
	}
}

require("views/login.phtml"); 
?>