<?php
$request = mysqli_query($db, "SELECT date, author, content, user.name, user.id FROM tchat, user WHERE user.id=author ORDER BY date");

if ($request)
{
	while($data = mysqli_fetch_assoc($request))
	{
		require("views/bloc_tchat.phtml");
	}
} 
else $error = "Erreur interne au serveur";
?>