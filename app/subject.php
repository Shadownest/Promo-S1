<?php 

if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new SubjectManager($db);
	$subject = $manager -> getSubject($id);

	if(isset($_POST['message']) && $_POST['message']!=""){
		$manager=new MessageManager($db);
		$id=$_GET['id'];
		
		$message=$manager->addMessage($_SESSION['id'], $id, nl2br($_POST['message']));
	}

	require('views/subject.phtml');
}

?>