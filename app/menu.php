<?php 
var_dump($_SESSION);
if (isset($_SESSION["id"])){
	if($_SESSION['admin']){
		$link="ucp_admin";
	}
	else{
		$link="ucp_user";
	}
	require("views/menu_co.phtml");
}
else 
	require("views/menu.phtml");
?>