<?php

if(isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"]))
{
	$manager=new UserManager($db);
	$user=$manager->register($_POST["login"],$_POST["email"],$_POST["password"],$_POST["password2"]);
	if (gettype($user) != "string"){
		header('Location: index.php?page=login');
		exit();
	}
	else{
		$error = $user;
	}
}

require("views/register.phtml"); 
?>