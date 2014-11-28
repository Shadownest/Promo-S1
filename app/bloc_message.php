<?php 





$id=$homeCategory[$i]->getId();
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










 ?>