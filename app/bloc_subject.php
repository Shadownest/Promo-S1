<?php 


/////////////////////////////////////////////////////
// la liste des sujects de chaque categorie
$id=1;
$manager = new SubjectManager($db);
$homeSubject = $manager-> displayListSubject($id);


$j=0;
while($j<count($homeSubject))
{
	$titleSubject=$homeSubject[$j];
	
	require('views/bloc_subject.phtml');
	$j++;
}









 ?>