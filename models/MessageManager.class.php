<?php
/*

	IL MANQUE UN public function getMessage($id) !!!!

*/

class MessageManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}


	public function displayListMessage($id)
	{

		$requete = "SELECT author_id, `message`.`id`, `message`.`text`, `user`.`name`, `message`.`creation_date`, `message`.`update_date`, `subject`.`title` FROM `message` LEFT JOIN user ON message.author_id=user.id LEFT JOIN subject ON message.subject_id=subject.id WHERE message.subject_id='".$id."'";
		
		$res = mysqli_query($this->db, $requete);
	
		if ($res)

		{		$list = array();	
				while ($message = mysqli_fetch_object($res, "Message", array($this->db)))
				{

				$list[] = $message;
			
				}

		     return $list;

		}
	}

	public function displayLastMessageOfSubject($id)
	{

		$requete = "SELECT `id`, `text`, `author_id`, `creation_date`, `update_date`, `subject_id` FROM `message` WHERE subject_id='".$id."' ORDER BY creation_date DESC limit 1 ";
		
		$res = mysqli_query($this->db, $requete);
		if ($res)
		{		
				$list = array();	
				while ($message = mysqli_fetch_object($res, "Message", array($this->db)))
				{

				$list[] = $message;
			
				}
		     
		     return $list;

		}


	}
	public function getMessage($id)
	{
		 $res = mysqli_query($this->db, "SELECT `id`, `text`,`author_id`, `creation_date`, `update_date`, `subject_id` FROM `message` WHERE category.id='".$id."'");
		
		if($res)
		{
			$message = mysqli_fetch_object($res, "Message");
			if($message)
			
				{
					return $message;
				}
		}

	return null;
	}	



}
?>