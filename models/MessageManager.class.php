<?php
/*

	IL MANQUE UN public function getMessage($id) !!!!

*/

class MessageManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}


	public function getListMessage($id)
	{

		$id = intval($id);
		$requete = "SELECT id, `text`, author_id, creation_date, update_date, subject_id FROM `message` WHERE subject_id='".$id."' ORDER BY creation_date DESC" ;
		
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
		 $res = mysqli_query($this->db, "SELECT `id`, `text`,`author_id`, `creation_date`, `update_date`, `subject_id` FROM `message` WHERE id='".$id."'");
		
		if($res)
		{
			$message = mysqli_fetch_object($res, "Message", array($this->db));
			if($message)
			
				{
					return $message;
				}
		}

	return null;
	}	

	public function addMessage($author_id, $subject_id, $text)
	{
		$res=mysqli_query($this->db, "INSERT INTO `forum`.`message` (`text`, `author_id`, `subject_id`) VALUES ('".$text."','".$author_id."','".$subject_id."')");
		
		if($res){
			return "Le message à été ajouté";
		}
		else{
			return "erreur lors de l'envoi du message";
		}
	}

}
?>