<?php 
require("config.php");

session_start();
$db = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
require("autoload.php");

$page="home";

$tab=array("home","register","login");

if(isset($_GET["page"])){
	$page=$_GET["page"];
}

if(in_array($page,$tab,true)){
	require("app/skel.php");
}
else{
	echo "ERREUR 404";
}

?>