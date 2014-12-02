<?php 

if(isset($_GET['id']) && $_GET['id']){
	$id=$_GET['id'];
	$manager = new CategoryManager($db);
	$homeCategory = $manager -> getListCategory();

	$titleCategory=$homeCategory[$id-1];

	require('views/category.phtml');
}

?>