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

}

?>