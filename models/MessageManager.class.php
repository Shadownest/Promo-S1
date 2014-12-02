<?php
/*

	IL MANQUE UN public function getMessage($id) !!!!

*/

class MessageManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}

	public function getMessageBySubject(Subject $subject, $limit = null)
	{
		$requete = "SELECT id, `text`, author_id, creation_date, update_date, subject_id FROM `message` WHERE subject_id='".$subject->getId()."' ORDER BY creation_date " ;
		if ($limit)
			$requete .= " LIMIT ".intval($limit);
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
/*
	public function getListMessage($id)
	{

		$id = intval($id);
		$requete = "SELECT id, `text`, author_id, creation_date, update_date, subject_id FROM `message` WHERE subject_id='".$id."' ORDER BY creation_date " ;
		
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
*/
	public function getLastMessageOfSubject(Subject $subject)
	{

		$requete = "SELECT `id`, `text`, `author_id`, `creation_date`, `update_date`, `subject_id` FROM `message` WHERE subject_id='".$subject->getId()."' ORDER BY creation_date DESC limit 1 ";
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

	public function createMessage(User $author, Subject $subject, $text)
	{
		$text = mysqli_real_escape_string($this->db, $text);
		$res=mysqli_query($this->db, "INSERT INTO `forum`.`message` (`text`, `author_id`, `subject_id`) VALUES ('".$text."','".$author->getId()."','".$subject->getId()."')");
		if($res)
		{
			$message = $this->getMessage(mysqli_insert_id($this->db));
			(new FeedManager($this->db))->createMessage($author, $message);
			return "Le message à été ajouté";
		}
		else{
			return "erreur lors de l'envoi du message";
		}
	}

	public function saveMessage(Message $message)
	{
		$res = mysqli_query($this->db, "UPDATE message SET `text`='".$message->getText()."' WHERE id='".$message->getId()."'");
		if ($res)
		{
			$message = $this->getMessage($message->getId());
			(new FeedManager($this->db))->editMessage($message->getAuthor(), $message);
			return $message;
		}
	}

}
?>