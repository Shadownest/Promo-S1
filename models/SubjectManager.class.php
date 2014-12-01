<?php
/*

	IL MANQUE UN public function getSubject($id) !!!!

*/
class SubjectManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	public function displayListSubject($id)
	{

		$requete = "SELECT subject.id, subject.title, subject.author_id, subject.category_id, user.name, subject.creation_date FROM subject LEFT JOIN category ON subject.category_id=category.id LEFT JOIN user ON subject.author_id=user.id WHERE category.id= '".$id."'"." ORDER BY creation_date DESC LIMIT 5";
		
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


	public function getSubject($id)
	{
		 $res = mysqli_query($this->db, "SELECT `id`, `title`,`author_id`, `creation_date`, `category_id`, `freeze` FROM `subject` WHERE category.id='".$id."'");
		
		if($res)
		{
			$subject = mysqli_fetch_object($res, "Subject");
			if($subject)
			
				{
					return $subject;
				}
		}

	return null;



	}	



}

?>