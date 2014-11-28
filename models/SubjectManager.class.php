<?php

class SubjectManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	public function displayListSubject($id)
	{

		$requete = "SELECT subject.title, user.name, subject.creation_date FROM subject LEFT JOIN category ON subject.category_id=category.id LEFT JOIN user ON subject.author_id=user.id WHERE category.id= '".$id."'"." ORDER BY creation_date DESC LIMIT 5";
		
		$res = mysqli_query($this->db, $requete);
	
		if ($res)

		{		$list = array();	
				while ($subject = mysqli_fetch_object($res, "Subject", array($this->db)))
				{

				$list[] = $subject;
			
				}
		     
		     return $list;

		}


	}








}

?>