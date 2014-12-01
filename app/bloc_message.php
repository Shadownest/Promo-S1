<?php 





$id=$Subject->getId();
$manager = new MessageManager($db);
$homeMessage = $manager-> displayListMessage($id);

//var_dump($homeMessage);
$k=0;
while($k<count($homeMessage))
{
	$Message=$homeMessage[$k];
	//require('views/bloc_subject.phtml');
	require('views/bloc_message.phtml');
	$k++;
}

//$id=$Subject->getId();
/*$id=18;
$manager = new MessageManager($db);
$id = $manager->getMessage($id);*/







 ?>