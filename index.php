<?php 
require("config.php");

session_start();
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
require("autoload.php");

$page="home";

<<<<<<< HEAD
$tab=array("addMessage", "home","register","login","logout", "ucp_admin", "ucp_user", "delete_subject", "edit_subject", "404", "category", "subject", "header", "feed", "bloc_category", "bloc_subject", "user", "member", "tchat","addsubject");
=======
$tab=array("home","register","login","logout", "ucp_admin", "ucp_user", "delete_subject", "edit_subject", "404", "category", "subject", "header", "feed", "bloc_category", "bloc_subject", "user", "member", "tchat");

$tab=array("home","register","login","logout", "ucp_admin", "ucp_user", "delete_subject", "edit_subject", "404", "category", "subject", "header", "feed", "bloc_category", "bloc_subject", "user", "member", "tchat","addsubject");
>>>>>>> b4d109ec5edcfd697245e769f9c8184b0e2fc134

if(isset($_GET["page"])){
	$page=$_GET["page"];
}

if(in_array($page,$tab,true)){
	if(isset($_GET["ajax"]))
		require("app/".$page.".php");
	else
		require("app/skel.php");
}

else{
	header("Location: index.php?page=404");
	exit();
}
?>