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

		$requete = "SELECT id, title, author_id, category_id, creation_date FROM subject WHERE category_id= '".$id."'"." ORDER BY creation_date DESC LIMIT 5";
		
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
		 $res = mysqli_query($this->db, "SELECT `id`, `title`,`author_id`, `creation_date`, `category_id`, `freeze` FROM `subject` WHERE id='".$id."'");
		
		if($res)
		{
			$subject = mysqli_fetch_object($res, "Subject", array($this->db));
			if($subject)
			
				{
					return $subject;
				}
		}

	return null;

	}	
}

?>