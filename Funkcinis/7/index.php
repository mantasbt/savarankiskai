<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Darbas Nr. 7</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php
	function getDb(){
	    $host = "localhost";
	    $user = "root";
	    $password = "";
	    $db = "seconddb";
	    $dsn = "mysql:host=$host;dbname=$db";
	    return new PDO($dsn, $user, $password);
	}
	function getAuthors(){
	    $sql = "SELECT * FROM authors";
	    $sth = getDb()->prepare($sql);
	    $sth->execute();
	    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	    $count = $sth->rowCount();
	    if($count > 0){
	        return $result;
	    } 
	    else {
	        return false;
	    }
	}
	$authors = getAuthors();

	function getAuthorsPosts(){
	    $sql = "SELECT * FROM authors LEFT JOIN posts ON posts.parent_id = authors.id";
	    $sth = getDb()->prepare($sql);
	    $sth->execute();
	    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
	    $count = $sth->rowCount();
	    if($count > 0){
	        return $result;
	    } 
	    else {
	        return false;
	    }
	}
	$authors_posts = getAuthorsPosts();

?>


<div class="container">
	<div class="row">

		<div class="col-md-6">
			<form action="register.php" method="POST">
				<legend style="text-align: center; margin-top: 15%;">Naujas įrašas pagal autorių</legend>
				<div class="form-group">
				    <label for="author">Autorius</label>
				    <select class="form-control" name="author" required>
				    	<option></option>
				    	<?php foreach ($authors as $author): ?>
				    	<option value="<?php echo $author['id']; ?>"> <?php echo $author['name']; ?> </option>
				    	<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="title">Antraštė</label>
					<input class="form-control" name="title" type="text" required>
				</div>
				<div class="form-group">
				    <label for="content">Įrašas</label>
					<textarea class="form-control" name="content" rows="3" required></textarea>
				</div>
				<button type="submit" name="new_post" class="btn btn-primary">Pridėti</button>
				<?php
					if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					}
				?>
			</form>
		</div>

		<div class="col-md-6">
			<table class="table table-striped" style="margin-top: 29%;">
			  	<thead>
			    	<tr>
				      	<th scope="col">Vardas</th>
				      	<th scope="col">Antraštė</th>
				      	<th scope="col">Įrašas</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			    	<?php foreach($authors_posts as $posts): ?>
					<tr>
						<td><?php echo $posts['name']; ?></td>
						<td><?php echo $posts['title']; ?></td>
						<td><?php echo $posts['content']; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

	</div>
</div>


</body>
</html>