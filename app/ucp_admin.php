<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE){


	// ------------------------ gestion des categories ---------------------------------------------------------------

	

	//suppresssion d'une categorie (transfert parallèle des sujets de la categorie dans la categorie "Archives")
	/*if(isset($_POST['delete_category'])){

		$manager = new CategoryManager($db);

		$category = $manager->deleteCategory($_POST['delete_category']);

		header("Location: index.php?page=ucp_admin");
		exit();

	}
	
	//creation d'une nouvelle categorie
	if(isset($_POST['title']), $_POST['position']){

		$manager = new CategoryManager($db);

		$category = $manager->createCategory($_POST['title']), $_POST['position']);

		header("Location: index.php?page=ucp_admin");
		exit();


	}

	//modification d'une nouvelle categorie
	if(isset($_POST['modify_category'])){

		$manager = new CategoryManager($db);

		$category = $manager->modifyCategory($_POST['modify_category']);

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
	
	/*$term = $_GET['term'];

	$manager = new UserManager($db);

	$user = $manager->checkName($term);	

	$array=array();

	while($donnee = $user->fetch()){
		array_push($array, $donnee['name']);
	}

	echo json_decode($user);*/
	
	require("views/ucp_admin.phtml");
	
 }
else{
	header("Location: index.php?page=home");
}

?>