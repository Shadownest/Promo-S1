<?php 
if(isset($_POST["content"])) {
		$res = mysqli_query($db,"INSERT INTO `forum`.`tchat` (`author`, `content`) VALUES ('".$_SESSION["id"]."', '".$_POST["content"]."')");
	}
	else if(isset($_GET["refresh"]) && $_GET["refresh"] == "true") {
		require("app/bloc_tchat.php");
	} 
else {
	require("views/tchat.phtml");
}
?>