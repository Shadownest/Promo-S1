<?php

if(isset($_SESSION["name"]) && $_SESSION["name"]!="")
{
	$avatar_modif="";
	$modification="";
	$modification_password="";
	$manager= new UserManager($db);

	$user = $manager->getUser($_SESSION['id']);

	if(isset($_POST['avatar']) && $_POST['avatar']!="")
	{
		$user->setAvatar($_POST['avatar']);
		$avatar_modif=$manager->saveUser($user);
		$_SESSION['avatar']=$_POST['avatar'];
	}

	if(isset($_POST['name'], $_POST['email']))
	{
		$user->setName($_POST['name']);
		$user->setEmail($_POST['email']);
		$user->setDescription($_POST['description']);
		$modification=$manager->saveUser($user);
		$_SESSION['name']=$_POST['name'];
	}

	if(isset($_POST['password'], $_POST['newPassword'], $_POST['newPassword2']) && $_POST['password']!="" && $_POST['newPassword']!="" && $_POST['newPassword2']!=""){
		$modification_password=$user->editPassword($_POST['password'], $_POST['newPassword'], $_POST['newPassword2']);
	}

	require("views/ucp_user.phtml");

}
?>