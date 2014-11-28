<?php 
if (isset($_SESSION["id"])){
	if($_SESSION['admin']){
		require("views/menu_admin.phtml");
	}
	else{
		require("views/menu_co.phtml");	
	}
}
else 
	require("views/menu.phtml");
?>