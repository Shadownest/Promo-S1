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

	public function deleteSubject($id)
	{
		$res = mysqli_query($this->db,"DELETE FROM `subject` WHERE id='".$id."'");
		if($res)
		{
			$deletesubject = mysqli_fetch_object($res, "Subject", array($this->db));
			if($deletesubject)
			{
				return $deletesubject;
			}
		}
	}

	public function addSubject($title, $author_id, $category_id)
	{
		$res = mysqli_query($this->db,"INSERT INTO  `forum`.`subject` (`title`, `author_id`, `category_id`) VALUES ('".$title."', '".$author_id."', '".$category_id."')");
		if($res)
		{
			return $res;

		}
		return null;
	}







}

?>