<?php

class Subject{

	private $id;
	private $title;
	private $author_id;
	private $creation_date;
	private $category_id;
	private $freeze;

	public function __construct(){
		
	}

	Public function getId(){

		return $this->id;
	}
	public function setId($id){

		$this->id = $id;
	}

	Public function getTitle(){

		return $this->title;
	}
	public function setTitle($title){

		$this->title = $title;
	}

	Public function getAuthor_id(){

		return $this->author_id;
	}
	public function setAuthor_id($author_id){

		$this->author_id = $author_id;
	}

	Public function getCreation_date(){

		return $this->creation_date;
	}
	public function setCreation_date($creation_date){

		$this->creation_date = $creation_date;
	}

	Public function getCategory_id(){

		return $this->category_id;
	}
	public function setCategory_id($category_id){

		$this->category_id = $category_id;
	}

	Public function getFreeze(){

		return $this->freeze;
	}
	public function setFreeze($freeze){

		$this->freeze = $freeze;
	}


}


?>