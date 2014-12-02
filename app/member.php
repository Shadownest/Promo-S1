<?php
if (isset($_SESSION["id"]))
{ 
	require("views/member.phtml"); 
} else {
	header("Location: index.php?page=404");
}
?>