<?php 
	$res = mysqli_query($db, "SELECT `user`.`name`, `subject`.`title` FROM `message`LEFT JOIN user ON message.author_id=user.id LEFT JOIN subject ON message.subject_id=subject.id ORDER BY user.id DESC LIMIT 1");
 	while ($data = mysqli_fetch_assoc($res))
 	{
 		$name = $data["name"];
 		$sujet = $data["title"];
 		require("views/refresh_message.phtml");
 	}
 ?>