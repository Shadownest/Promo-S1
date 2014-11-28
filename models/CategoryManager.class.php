<?php

class CategoryManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	//panel admin

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
		 $res = mysqli_query($this->db, "SELECT `id`, `title`, `position` FROM `category` WHERE category.id='".$id."'");
		
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