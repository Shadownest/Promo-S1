<?php 
// la liste des sujects de chaque categorie
$manager = new SubjectManager($db);

if(isset($_GET['page']) && $_GET['page']=="category"){
	$id=$titleCategory->getId();
	$homeSubject = $manager-> displayListAllSubject($id);
}
else{
	$id=$homeCategory[$i]->getId();
	$homeSubject = $manager-> displayListSubject($id);
}

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

?>