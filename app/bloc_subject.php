<?php 
// la liste des sujects de chaque categorie
//$id = $titleCategory->getId();
$id=$titleCategory->getId();

$manager = new SubjectManager($db);
$homeSubject = $manager-> displayListSubject($id);

$j=0;
while($j<count($homeSubject))
{
	$Subject=$homeSubject[$j];

	$lastMessage= mysqli_query($db, "SELECT `user`.`name` FROM `message`LEFT JOIN user ON message.author_id=user.id LEFT JOIN subject ON message.subject_id=subject.id LEFT JOIN category ON message.subject_id=subject.id and subject.category_id=category.id WHERE category.id='".$id."' ORDER BY message.subject_id DESC LIMIT 1");
	if($lastMessage){
		$lastMessage=mysqli_fetch_assoc($lastMessage);
	}
	else
		$lastMessage="Aucun message pour ce sujet";
	
	require('views/bloc_subject.phtml');
	$j++;
}

/*$manager = new SubjectManager($db);
$id = $manager->getSubject($id);*/


 ?>