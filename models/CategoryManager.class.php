<?php

class CategoryManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	public function categoriesAdmin(){

	$res=mysqli_query($this->db, "SELECT title from category");
	if($res){
	 	$category = mysqli_fetch_object($res, "Category");
	 	return $category; 
	 	}
		return null;
	}

	public function deleteCategory(){

	mysqli_query($this->db, "DELETE FROM category WHERE ");
		
	}

	public function createCategory(){

	//mysqli_query($this->db, "INSERT INTO `forum` ");
		
	}

	public function displayListCategory()

	{	$requete = "SELECT `title`FROM `category` ORDER BY `position`";
		
		$res = mysqli_query($this->db, $requete);
		//print_r($res);
		if ($res)

		{		$list = array();	
				while ($category = mysqli_fetch_object($res, "Category"))
				{
				$list[] = $category;
			
				}
		     //var_dump($list);
		     return $list;

		}
	}
	public function getCategory($id)
	{
		 $res = mysqli_query($this->db, "SELECT `title` FROM `category` WHERE category.id='".$id."'");
		
		if($res)
		{
			$category = mysqli_fetch_object($res, "Category");
			if($category)
				var_dump($category);
				{
					return $category;
				}
		}

	return null;



	}


}

?>