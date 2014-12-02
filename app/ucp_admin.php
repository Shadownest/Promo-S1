<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE){

	$title="";
	$position="";
	$id="";
	$modif_category="";
	$manager = new CategoryManager($db);
	// ------------------------ gestion des categories ---------------------------------------------------------------

	// récupération de la liste des categories, en vue de la suppression eventuelle de l'une d'entre elles -> cf. admin_categorylist.php


	//suppresssion d'une categorie (transfert parallèle des sujets de la categorie selectionnee dans la categorie "Archives")
	if(isset($_POST['category'])){

		$category = $manager->deleteCategory($_POST['category']);

	}

	//sélection de la categorie à modifier
	if(isset($_POST['modif_category'])){

		$select_category = $manager->getCategory($_POST['modif_category']);

		$title=$select_category->getTitle();
		$position=$select_category->getPosition();
		$id=$select_category->getId();
	}

	//modification d'une categorie
	if(isset($_POST['name_category'], $_POST['pos_category'])){
		$save_category = $manager->saveCategory($_POST['id'], $_POST['name_category'], $_POST['pos_category']);
	}

	/*
	//creation d'une nouvelle categorie
	if(isset($_POST['title']), $_POST['position']){

		$manager = new CategoryManager($db);

		$category = $manager->createCategory($_POST['title']), $_POST['position']);

		header("Location: index.php?page=ucp_admin");
		exit();


	}

	// ------------------------ gestion des utilisateurs ---------------------------------------------------------------


	// suppression d'un membre
	if(isset($_POST['delete_user'])){
	
		$manager = new UserManager($db);

		$user = $manager->deleteUser($_POST['delete_user']);

		header("Location: index.php?page=ucp_admin");
		exit();

	}*/

	//gestion du niveau d'admnistration d'un membre du forum (utilisateur, moderateur, admnistrateur)
	
	$term = $_GET['term'];
	print_r($term);

	$manager = new UserManager($db);

	$user = $manager->findUserByName($term);	

	$array=array();

	while($donnee = $user->fetch()){
		array_push($array, $donnee['name']);
	}

	echo json_decode($user);


	
	require("views/ucp_admin.phtml");
	
 }
else{
	header("Location: index.php?page=home");
}

?>