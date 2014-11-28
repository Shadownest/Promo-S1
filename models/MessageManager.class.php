<?php

class MessageManager{

	private $db;

	public function __construct($db){

		$this->db = $db;

	}


	public function displayListMessage($id)
	{

		$requete = "SELECT `message`.`id`, `message`.`text`, `user`.`name`, `message`.`creation_date`, `message`.`update_date`, `subject`.`title` FROM `message` LEFT JOIN user ON message.author_id=user.id LEFT JOIN subject ON message.subject_id=subject.id";
		
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


}
?>