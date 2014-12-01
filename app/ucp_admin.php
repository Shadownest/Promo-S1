<?php

/*if (isset($_SESSION['admin']) && $_SESSION['admin'] == TRUE){


	// ------------------------ gestion des categories ---------------------------------------------------------------


	//selection des categories (pour affichage de la liste sur le panel)
	if(isset($_POST['display_categoriesList'])){

		$manager = new CategoryManager($db);

		$category = $manager->displayCategoriesList($_POST['display_categoriesList']);

		header("Location: index.php?page=ucp_admin");
		exit();
	}

	//suppresssion d'une categorie (transfert parallèle des sujets de la categorie dans la categorie "Archives")
	if(isset($_POST['delete_category'])){

		$manager = new CategoryManager($db);

		$category = $manager->deleteCategory($_POST['delete_category']);

		header("Location: index.php?page=ucp_admin");
		exit();

	}
	
	//creation d'une nouvelle categorie
	if(isset($_POST['create_category'])){

		$manager = new CategoryManager($db);

		$category = $manager->createCategory($_POST['create_category']);

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


	//gestion du niveau d'admnistration d'un membre du forum (utilisateur, moderateur, admnistrateur)

	if(isset()){



	}




	else{*/
		require("views/ucp_admin.phtml");
	/*}
 }
else{
	header("Location: index.php?page=home");
}*/	

?>