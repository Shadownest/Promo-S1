<?php

$avatar_modif="";
$modification="";
$manager= new UserManager($db);

if(isset($_SESSION["name"]) && $_SESSION["name"]!="")
{
	if(isset($_POST['avatar']) && $_POST['avatar']!="")
	{
		$avatar_modif=$manager->changeAvatar($_POST['avatar'], $_SESSION["name"]);
		exit();
	}
	else if(isset($_POST['name'], $_POST['email'], $_POST['description'])){
		$modification=$manager->modifyUser($_POST['name'], $_POST['email'], $_POST['description'], $_POST['password'], $_POST['newpassword'], $_POST['newpassword2']);
	}

	require("views/ucp_user.phtml");
}

?>