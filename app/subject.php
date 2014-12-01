<?php 

if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new SubjectManager($db);
	$subject = $manager -> getSubject($id);

	require('views/subject.phtml');
}

?>