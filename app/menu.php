<?php 
if (isset($_SESSION["id"]))
	require("views/menu_co.phtml"); 
else 
	require("views/menu.phtml");
?>