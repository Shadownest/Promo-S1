<?php 


/////////////////////////////////////////////////////
// la liste des sujects de chaque categorie
//$id = $titleCategory->getId();
$id=$homeCategory[$i]->getId();
$manager = new SubjectManager($db);
$homeSubject = $manager-> displayListSubject($id);


$j=0;
while($j<count($homeSubject))
{
	$Subject=$homeSubject[$j];

	
	require('views/bloc_subject.phtml');
	$j++;
}









 ?>