<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Darbas Nr. 8</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<div class="row">

		<div class="col-md-6">
			<form action="search.php" method="GET">
				<legend style="text-align: center; margin-top: 15%;">Ieškoti įrašų</legend>
				<div class="form-group">
				    <label for="surname">Vardas</label>
				    <input class="form-control" name="surname" type="text">
				</div>
				<div class="form-group">
					<label for="forename">Pavardė</label>
					<input class="form-control" name="forename" type="text">
				</div>
				<div class="form-group">
				    <label for="module_code">Modulis</label>
					<input class="form-control" name="module_name" type="text">
				</div>
				<button type="submit" class="btn btn-primary">Ieškoti</button>
			</form>
		</div>


		<div class="col-md-6">
			<table class="table table-striped" style="margin-top: 5%;">
				<legend style="text-align: center; margin-top: 17%;">Paieškos rezultatai</legend>
			  	<thead>
			    	<tr>
				      	<th scope="col">Vardas</th>
				      	<th scope="col">Pavardė</th>
				      	<th scope="col">Modulis</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			    	<?php if(isset($_SESSION['results']) && !empty($_SESSION['results'])):
				    	$results = $_SESSION['results'];
				    	foreach($results as $result): 
			    	?>
						<tr>
							<td><?php echo $result['surname']; ?></td>
							<td><?php echo $result['forename']; ?></td>
							<td><?php echo $result['module_name']; ?></td>
						</tr>
					<?php endforeach; endif; ?>
				</tbody>
			</table>
			<?php
			if(isset($_SESSION['error'])){
	    		echo $_SESSION['error'];
	    	}
			?>
		</div>

<?php 
	unset($_SESSION['error']);
	unset($_SESSION['results']); 
?>

	</div>
</div>


</body>
</html>