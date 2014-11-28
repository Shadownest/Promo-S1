<?php

class Subject{

	private $id;
	private $title;
	private $author_id;
	private $creation_date;
	private $category_id;
	private $freeze;
	private $db;
	private $author;

	public function __construct($db){
		$this->db = $db;
	}

	public function getId(){

		return $this->id;
	}
	public function setId($id){

		$this->id = $id;
	}

	public function getTitle(){

		return $this->title;
	}
	public function setTitle($title){

		$this->title = $title;
	}

	public function getAuthor()
	{
		
		if (!$this->author)
		{	
			$manager = new UserManager($this->db);
			$this->author = $manager->getUser($this->author_id);

			// Pour récupérer le nom de l'auteur on utilise $subject->getAuthor()->getUser;
		}
		
		return $this->author;
	}
	public function getAuthor_id(){

		return $this->author_id;
	}
	public function setAuthor_id($author_id){

		$this->author_id = $author_id;
	}

	public function getCreation_date(){

		return $this->creation_date;
	}
	public function setCreation_date($creation_date){

		$this->creation_date = $creation_date;
	}

	public function getCategory_id(){

		return $this->category_id;
	}
	public function setCategory_id($category_id){

		$this->category_id = $category_id;
	}

	public function getFreeze(){

		return $this->freeze;
	}
	public function setFreeze($freeze){

		$this->freeze = $freeze;
	}


}


?>