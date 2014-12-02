<?php 
if(isset($_POST["content"])) {
		$content = mysqli_real_escape_string($db, $_POST["content"]);
		$res = mysqli_query($db,"INSERT INTO `forum`.`tchat` (`author`, `content`) VALUES ('".$_SESSION["id"]."', '".$content."')");
	}
	else if (isset($_GET["refresh"]) && $_GET["refresh"] == "true") {
		require("app/bloc_tchat.php");
	} else if (isset($_POST["delete"]) && $_POST["delete"] == "true") {
		$resDelete = mysqli_query($db, "DELETE FROM `forum`.`tchat` WHERE `tchat`.`id` = '".$_POST["id"]."'");
	}
else {
	require("views/tchat.phtml");
}
?>