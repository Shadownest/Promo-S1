<?php 
/*

	IL MANQUE UN public function getSubject() !!!!

*/

class Message{
	private $id;
	private $text;
	private $author_id;
	private $creation_date;
	private $update_date;
	private $subject_id;
	private $db;
	private $author;
	private $subject;

	public function __construct($db){
	$this->db = $db;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getText(){
		return $this->text;
	}
	public function setText($text){
		$this->text=$text;
	}
	public function getAuthor_id(){
		return $this->author_id;
	}
	public function setAuthor_id($author_id){
		$this->author_id=$author_id;
	}
	public function getCreation_date(){
		return $this->creation_date;
	}
	public function setCreation_date($creation_date){
		$this->creation_date=$creation_date;
	}
	public function getUpdate_date(){
		return $this->update_date;
	}
	public function setUpdate_date($update_date){
		$this->update_date=$update_date;
	}
	public function getSubject_id(){
		return $this->subject_id;
	}
	public function setSubject_id($subject_id){
		$this->subject_id=$subject_id;
	}

	public function getAuthor()
	{
		
		if (!$this->author)
		{	
			$manager = new UserManager($this->db);
			$this->author = $manager->getUser($this->author_id);

			// Pour récupérer le nom de l'auteur on utilise $subject->getAuthor()->getName;
		}
		return $this->author;
	}
	public function getSubject()
		{
			if (!$this->subject)
			{	
				$manager = new SubjectManager($this->db);
				$this->subject = $manager->getSubject($this->subject_id);
			}
			return $this->subject;
		}

}
?>