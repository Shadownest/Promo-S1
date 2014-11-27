<?php

class CategoryManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

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



}

?>