<?php 

require('views/addsubject.phtml');



if(isset($_POST['title']) && isset($_POST['author_id']) && isset($_POST['category_id']))
{	
	$manager = new SubjectManager($db);
	$manager->addSubject($_POST['title'],$_POST['author_id'],$_POST['category_id']);
	var_dump($manager);
	header('Location: index.php?page=home');
	exit;
}
else
{
	return null;
}









 ?>