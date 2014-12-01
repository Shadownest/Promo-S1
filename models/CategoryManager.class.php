<?php

class CategoryManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	//---------------------------- ucp admin -----------------------------------



	public function displayCategoriesList(){
	//génération d'une liste des categories qui s'affiche dans le selecteur
	$res=mysqli_query($this->db, "SELECT title from category");
	if($res)
		{
	 	$list_category = mysqli_fetch_object($res, "Category");
	 	return $list_category; 
	 	}
	}
	/*
	public function deleteCategory(){

	//tranférer sujets de la catégorie à supprimer :
	
	mysql_query($this->db, "UPDATE `forum`.`subjects` SET `category`.`id`='3' WHERE `category`.`id`=''");

	//suppression de la categorie selectionnee :

	mysqli_query($this->db, "DELETE FROM category WHERE id='' ");
		
	}


	public function createCategory($title, $position){

	//creation  d'une nouvelle categorie
	mysqli_query($this->db, "INSERT INTO `forum`.`category`(title, position) VALUES ('".$title."', '".$position."')");
	
	}*/


	//homepage

	public function displayListCategory()

	{	$requete = "SELECT `id`,`title`FROM `category` ORDER BY `position`";
		
		$res = mysqli_query($this->db, $requete);
		
		if ($res)

		{		$list = array();	
				while ($category = mysqli_fetch_object($res, "Category"))
				{
				$list[] = $category;
			
				}
		   
		     return $list;

		}
	}
	
	public function getCategory($id)
	{

		 $res = mysqli_query($this->db, "SELECT `id`, `title`,`position` FROM `category` WHERE category.id='".$id."'");
		
		if($res)
		{
			$category = mysqli_fetch_object($res, "Category");
			if($category)
			
				{
					return $category;
				}
		}

	return null;
	}

	


}

?>