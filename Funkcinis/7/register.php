<?php 
	session_start();

	function getDb(){
	    $host = "localhost";
	    $user = "root";
	    $password = "";
	    $db = "seconddb";
	    $dsn = "mysql:host=$host;dbname=$db";
	    return new PDO($dsn, $user, $password);
	}

	if(isset($_POST['new_post'])){
	    $parent_id = $_POST['author'];
	    $post_title = $_POST['title'];
	    $post_content = $_POST['content'];
	    registerPost(['title' => $post_title,'content' => $post_content,'parent_id' => $parent_id]);
	}else{
		echo "Error";
	}

	function registerPost($data){
	    $sql = "INSERT INTO posts (id, title, content, parent_id) VALUES (:id, :title, :content, :parent_id)";    
	    $sth = getDb()->prepare($sql);
	    $sth->execute([
	    	"id" => null,
	        "title" => $data['title'],
	        "content" => $data['content'],
	        "parent_id" => $data['parent_id']
	    ]);
	    if($sth->rowCount() > 0){
	    	$_SESSION['message'] = "<p style='color:green;margin-top:5%'>Naujas įrašas pridėtas</p>";
	    	header("Location: index.php");
	    }else{
	    	$_SESSION['message'] = "<p style='color:red;margin-top:5%'>Įvyko klaida</p>";
	    	header("Location: index.php");
	    }
	}
