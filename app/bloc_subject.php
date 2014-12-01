<?php 
// la liste des sujects de chaque categorie

if (!isset($_GET["id"]))
{
	$id=$homeCategory[$i]->getId();
	$manager = new SubjectManager($db);
	$homeSubject = $manager-> displayListSubject($id);


	$j=0;
	while($j<count($homeSubject))
	{
		$Subject=$homeSubject[$j];

		$manager = new MessageManager($db);
		$homeMessage = $manager->displayLastMessageOfSubject($Subject->GetId());

		$Message= new Message($db);
		$lastAuthor="Aucun message pour ce sujet";
		if ($homeMessage)
		{
			$Message=$homeMessage[0];
			
			$lastAuthor="Dernier message par : ".$Message->getAuthor()->getName();
		}
		
		require('views/bloc_subject.phtml');
		$j++;
	}
}
else
{
	$id=$_GET["id"];
	require('app/bloc_message.php');
}
?>