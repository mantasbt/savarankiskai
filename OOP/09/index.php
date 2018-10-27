<?php

class Post
{
	private const MAX_LENGTH = 500;

	private $title;
	private $content;
	private $author;

	public function setTitle($title){
		$this->title = $title;
	}
    public function getTitle(){
    	return $this->title;
    }

    public function setContent($content){
    	if(strlen($content) > Post::MAX_LENGTH){
    		$this->content = "Max content length is: " . Post::MAX_LENGTH;
    	}else{
    		$this->content = $content;
    	}
	}
	public function getContent(){
		return $this->content;
	}

	public function setAuthor(Person $author){
		$this->author = $author;
	}
	public function getAuthor(){
		return $this->author;
	}
}

class Person
{
	private $id;
	private $name;

	public function setID($id){
		$this->id = $id;
	}
	public function getID(){
		return $this->id;
	}

	public function setName($name){
		$this->name = $name;
	}
	public function getName(){
		return $this->name;
	}
}

$person = new Person();
$person->setName("John");
$person->setId(10);

$post = new Post();
$post->setTitle("My titile");
$post->setContent("Lorem Ipsum is simply dummy text of the printing and typesetting industry.");
$post->setAuthor($person);

echo "<pre>";
var_dump($post->getAuthor());
echo "</pre>";

