<?php 

class Message{
	private $id;
	private $title;
	private $position;

	public function __construct(){
		$this->setId($this->id);
		$this->setTitle($this->title);
		$this->setPosition($this->position);
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