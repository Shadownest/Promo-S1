<?php 

class Category{
	private $id;
	private $title;
	private $position;
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id=$id;
	}
	public function getTitle(){
		return $this->title;
	}
	public function setTitle($title){
		$this->title=$title;
	}
	public function getPosition(){
		return $this->position;
	}
	public function setPosition($position){
		$this->position=$position;
	}
}
?>