<?php 
if (isset($_SESSION["id"])){
	require("views/menu_co.phtml"); 
	if($_SESSION['admin']){
		$link="ucp_admin";
	}
	else{
		$link="ucp_user";
	}
}
else 
	require("views/menu.phtml");
?>