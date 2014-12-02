<?php 

if(isset($_GET['id']) && $_GET['id']!=""){

	$id=$_GET['id'];
	$manager = new MessageManager($db);
	$homeMessage = $manager-> getListMessage($id);

	$i=0;
	while($i<count($homeMessage))
	{
		$Message=$homeMessage[$i];
		require('views/message.phtml');
		$i++;
	}

	/*$id = $manager->getMessage($id);*/
}




 ?>