<?php


if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new SubjectManager($db);
	$deletesubject = $manager -> deleteSubject($id);

	require('views/subject.phtml');
}


//requete sql pour effacer la categorie sélectionnée 
//redirection
//exit


?>