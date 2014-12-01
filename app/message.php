<?php 

if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new MessageManager($db);
	$homeMessage = $manager-> displayListMessage($id);

	//var_dump($homeMessage);
	$i=0;
	while($i<count($homeMessage))
	{
		$Message=$homeMessage[$k];
		//require('views/bloc_subject.phtml');
		require('views/bloc_message.phtml');
		$i++;
	}

	//$id=$Subject->getId();
	/*$id=18;
	$manager = new MessageManager($db);
	$id = $manager->getMessage($id);*/
}




 ?>