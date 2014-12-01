<?php 
// la liste des sujects de chaque categorie
//$id = $titleCategory->getId();
$id=$titleCategory->getId();

$manager = new SubjectManager($db);
$homeSubject = $manager-> displayListSubject($id);

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
/*
	$Subject=$homeSubject[$j];

	$lastMessage= mysqli_query($db, "SELECT `user`.`name` FROM `message`LEFT JOIN user ON message.author_id=user.id LEFT JOIN subject ON message.subject_id=subject.id LEFT JOIN category ON message.subject_id=subject.id and subject.category_id=category.id WHERE category.id='".$id."' ORDER BY message.subject_id DESC LIMIT 1");
	if($lastMessage){
		$lastMessage=mysqli_fetch_assoc($lastMessage);
	}

	require('views/bloc_subject.phtml');
	$j++;
}

$manager = new SubjectManager($db);
$id = $manager->getSubject($id);*/


 ?>