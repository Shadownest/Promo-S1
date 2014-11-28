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
		$avatar_modif=$manager->changeAvatar($_POST['avatar'], $_SESSION["name"]);
		$avatar=$_POST['avatar'];
		$_SESSION['avatar']=$avatar;
	}
	if(isset($_POST['name'], $_POST['email'])){
		$modification=$manager->modifyUser($_SESSION['id'], $_POST['name'], $_POST['email'], $_POST['description']);
		$_SESSION['name']=$_POST['name'];
	}
	if(isset($_POST['password'], $_POST['newPassword'], $_POST['newPassword2']) && $_POST['password']!="" && $_POST['newPassword']!="" && $_POST['newPassword2']!=""){
		$modification_password=$manager->modifyPasswordUser($_SESSION['id'], $_POST['password'], $_POST['newPassword'], $_POST['newPassword2']);
	}

	require("views/ucp_user.phtml");
}

?>