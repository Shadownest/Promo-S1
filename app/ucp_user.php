<?php

if(isset($_SESSION["name"]) && $_SESSION["name"]!=""){
	if(isset($_POST['avatar']) && $_POST['avatar']!=""){
		
	}
	require("views/ucp_user.phtml");
}

?>