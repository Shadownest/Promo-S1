<?php 
require("config.php");

session_start();
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
require("autoload.php");

$page="home";

$tab=array("home","register","login","logout", "ucp_admin", "ucp_user", "delete_subject", "edit_subject", "404", "category", "subject");

if(isset($_GET["page"])){
	$page=$_GET["page"];
}

if(in_array($page,$tab,true)){
	if(isset($_GET["ajax"]) && $_GET["ajax"]=="true")
		require("app/content.php");
	else
		require("app/skel.php");
}

else{
	header("Location: index.php?page=404");
	exit();
}
?>