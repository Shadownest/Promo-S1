<?php 

if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new CategoryManager($db);
	$homeCategory = $manager -> getListCategory();

	$titleCategory=$homeCategory[$id-1];

	if(isset($_POST['title']))
	{	
		$manager = new SubjectManager($db);
		$manager->addSubject($_POST['title'],$_SESSION['id'],$_GET['id']);
		
	}

	require('views/category.phtml');
}

?>