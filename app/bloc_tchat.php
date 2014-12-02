<?php
$button_sup = "";
$request = mysqli_query($db, "SELECT date, author, content, tchat.id AS message_id, user.id, user.name FROM tchat, user WHERE user.id=author ORDER BY date");

if ($request)
{
	while($data = mysqli_fetch_assoc($request))
	{
		if ($_SESSION["admin"] == true)
			$button_sup = "<button id='click_sup'><i class='fa fa-remove'></i></button>";
		else 
			$button_sup = "";

		require("views/bloc_tchat.phtml");
	}
	
} 
else $error = "Erreur interne au serveur";
?>