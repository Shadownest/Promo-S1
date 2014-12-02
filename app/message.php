<?php 
if(isset($_GET['id']) && $_GET['id']!=""){

	$id=$_GET['id'];
	$manager = new MessageManager($db);

	$homeMessage = $manager-> getMessageBySubject($subject,0);


	$i=0;
	while($i<count($homeMessage))
	{
		if ($_SESSION["admin"] == true)
		{
			$addSupButton = "<button class='button_message' name='delete' type='submit'><i class='fa fa-remove'></i> Supprimer</button>";
			$addEditButton = "<button class='button_message' name='edit' type='submit'><i class='fa fa-pencil'></i> Editer</button>";
		} else if ($_SESSION["moderator"] == true) {
			$addSupButton = "";
			$addEditButton = "<button class='button_message' name='edit' type='submit'><i class='fa fa-pencil'></i> Editer</button>";
		} else {
			$addSupButton = "";
			$addEditButton = "";
		}


		$Message=$homeMessage[$i];
		$author_id=$Message->getAuthor_id();
		$manager = new UserManager($db);
		$user=$manager->getUser($author_id);
		$avatar=$user->getAvatar($author_id);
		require('views/message.phtml');
		$i++;
	}

	/*$id = $manager->getMessage($id);*/
}




 ?>