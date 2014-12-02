<?php
/*

	IL MANQUE UN public function getSubject($id) !!!!

*/
class SubjectManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	public function getSubjectByCategory(Category $category, $limit = null)
	{
		$requete = "SELECT `id`, `title`,`author_id`, `creation_date`, `category_id`, `freeze` FROM subject WHERE category_id= '".$category->getId()."'"." ORDER BY creation_date DESC";
		if ($limit)
			$requete .= " LIMIT ".intval($limit);
		$res = mysqli_query($this->db, $requete);
		if ($res)
		{
			$list = array();
			while ($subject = mysqli_fetch_object($res, "Subject", array($this->db)))
			{
				$list[] = $subject;
			}
		    return $list;
		}
	}
/*
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
	public function displayListAllSubject($id)
	{

		$requete = "SELECT id, title, author_id, category_id, creation_date FROM subject WHERE category_id= '".$id."'"." ORDER BY creation_date DESC";
		
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
*/

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

	public function deleteSubject(Subject $subject)
	{
		$res = mysqli_query($this->db, "DELETE FROM `subject` WHERE id='".$subject->getId()."'");
		if($res)
		{
			(new FeedManager($this->db))->deleteSubject((new UserManager($this->db))->getUser(16), $subject);
			return $subject;
		}
	}

	public function saveSubject(Subject $subject)
	{
		$res = mysqli_query($this->db, "UPDATE subject SET title='".$subject->getTitle()."' WHERE id='".$subject->getId()."'");
		if ($res)
		{
			(new FeedManager($this->db))->editSubject((new UserManager($this->db))->getUser(16), $subject);
			return $this->getSubject($subject->getId());
		}
	}

	public function addSubject(User $author, Category $category, $title)
	{
		$title = mysqli_real_escape_string($this->db, $title);
		$res = mysqli_query($this->db,"INSERT INTO  `forum`.`subject` (`title`, `author_id`, `category_id`) VALUES ('".$title."', '".$author->getId()."', '".$category->getId()."')");
		if($res)
		{
			$subject = $this->getSubject(mysqli_insert_id($this->db));
			(new FeedManager($this->db))->createSubject($author, $subject);
			return $subject;
		}
		return null;
	}







}

?>