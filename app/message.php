<?php 

if(isset($_GET['id']) && $_GET['id']!=""){

	$id=$_GET['id'];
	$manager = new MessageManager($db);
	$homeMessage = $manager-> getListMessage($id);

	$i=0;
	while($i<count($homeMessage))
	{
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