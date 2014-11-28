<?php

if(isset($_SESSION["name"]) && $_SESSION["name"]!="")
{
	$avatar_modif="";
	$modification="";
	$manager= new UserManager($db);

	$user = $manager->getUser($_SESSION['id']);

	if(isset($_POST['avatar']) && $_POST['avatar']!="")
	{
		$avatar_modif=$manager->changeAvatar($_POST['avatar'], $_SESSION["name"]);
		$avatar=$_POST['avatar'];
		$_SESSION['avatar']=$avatar;
		exit();
	}
	else if(isset($_POST['name'], $_POST['email'], $_POST['description'])){
		$modification=$manager->modifyUser($_POST['name'], $_POST['email'], $_POST['description'], $_POST['password'], $_POST['newpassword'], $_POST['newpassword2']);
	}

	require("views/ucp_user.phtml");
}

?>