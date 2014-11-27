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

		if ($_SESSION['admin']){
			require("views/ucp_admin.phtml");
		}
		else{
			require("views/ucp_user.phtml");
		}
		exit();
	}
	else{
		$error = $user;
	}
}

require("views/login.phtml"); 
?>