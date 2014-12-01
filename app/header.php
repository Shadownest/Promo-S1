<?php 
//$res = mysqli_query($db, "");
if (isset($_GET["refresh"]) && $_GET["refresh"] == "true")
{
	require("app/refresh_message.php");
}
else
	require("views/header.phtml"); 
?>