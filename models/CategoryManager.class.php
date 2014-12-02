<?php

class CategoryManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	//---------------------------- ucp admin -----------------------------------





	public function deleteCategory($id){

	//tranférer sujets de la catégorie à supprimer :
	
	$maj=mysqli_query($this->db, "UPDATE `forum`.`subject` SET `category_id`='3' WHERE `category_id`='".$id."'");

		if($maj){
				return "Sujets déplacés à la catégorie Archives";
		}
		else{
				return "Erreur lors du transfert. Veuillez réessayer ultérieurement.";
		}

	//suppression de la categorie selectionnee :

	$del=mysqli_query($this->db, "DELETE FROM category WHERE id='".$id."' ");
	if($del){
			return "Categorie supprimée";
		}
		else{
			return "Erreur lors de la suppression. Veuillez réessayer ultérieurement.";
		}
	}
	
	public function modifyCategory($id, $title, $position){
		$res=mysqli_query($this->db, "UPDATE  `forum`.`category` SET  `title` ='".$title."', position='".$position."' WHERE  `category`.`id` ='".$id."'");
		if($res){
			return "Categorie modifiée";
		}
		else{
			return "Erreur lors de la modification. Veuillez réessayer ultérieurement.";
		}
	}

	/*
	public function createCategory($title, $position){

	//creation  d'une nouvelle categorie
	mysqli_query($this->db, "INSERT INTO `forum`.`category`(title, position) VALUES ('".$title."', '".$position."')");
	
	}*/


	//homepage

	public function getListCategory()

	{	$requete = "SELECT `id`,`title` FROM `category` ORDER BY `position`";
		
		$res = mysqli_query($this->db, $requete);
		
		if($res)

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