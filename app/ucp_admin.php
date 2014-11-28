<?php

if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE){


	//appel au fichier delete_category.php



	// gestion des categories

		//suppression

		// modification


	// gestion des membres


		// gestion moderation
		// suppression d'un membre


	else{
		require("views/ucp_admin.phtml");
	}
 }
else{
	header("Location: index.php?page=home");
} 




/*if (isset($_POST['categories_admin'])){

		$manager = new CategoryManager($db);
		$category = $manager->categoriesAdmin($_POST['categories_admin']);

		header("Location: index.php?page=ucp_admin");
		exit();
	}

	if(isset($_POST['delete_category'])){

		$manager = new CategoryManager($db);
		$category = $manager->deleteCategory($_POST['delete_category']);

		header("Location: index.php?page=ucp_admin");
		exit();

	}

	if(isset($_POST['create_category'])){

		$manager = new CategoryManager($db);
		$category = $manager->createCategory($_POST['create_category']);

		header("Location: index.php?page=ucp_admin");
		exit();
	}*/






?>