<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daras Nr.5</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="col-sm-12 from_box">
		<div class="col-lg-3 col-sm-6">
			<form enctype="multipart/form-data" action="data.php" method="post">
				<div class="form-group">
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
			    	<label for="name">Nuotrauka:</label>
			    	<input type="file" class="form-control-file" name="userfile" required>
			  	</div>
			  	<button type="submit" class="btn btn-primary">Įkelti</button>
			</form>
		</div>
	</div>


<?php
	
	if(!empty($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	echo "<br>";
	if(!empty($_SESSION['file_upload'])){
		echo $_SESSION['file_upload'];
		unset($_SESSION['file_upload']);
	}


	echo "<br>";
	echo "<br><b>Įkelti failai:</b><br>";
	$file = "files.txt";

	if(file_exists($file)){
		$file_data = file($file);
		if(!empty($file)){
			foreach ($file_data as $record) {
				echo $record."<br>";
			}
		}
	}


	echo "<br><br>";
	echo "<h3>Datų skirtumų filtravimas</h3>";

	$dates = array (
	    0 => '2018-10-06 13:32:08',
	    1 => '2017-10-06 13:00:07',
	    2 => '2001-06-06 06:02:12',
	    3 => '2015-04-21 04:50:26',
	    4 => '2014-04-05 07:53:55',
	    5 => '2018-01-07 20:40:34',
	    6 => '1986-09-21 02:26:38',
	    7 => '2014-08-12 05:47:48',
	    8 => '1971-09-03 00:26:37',
	    9 => '1992-10-08 17:24:03',
	    10 => '1983-12-02 07:56:36',
	    11 => '1987-11-29 05:38:05',
	    12 => '2012-03-18 16:19:56',
	    13 => '1977-08-28 15:11:20',
	    14 => '2003-03-09 00:03:33',
	    15 => '2008-04-18 03:50:12',
	    16 => '2000-06-04 14:28:08',
	    17 => '2017-12-08 13:27:04',
	    18 => '1975-10-10 23:13:53',
	    19 => '1988-08-10 20:51:51',
	    20 => '2009-05-25 03:41:38',
	    21 => '1980-11-30 13:35:47',
	    22 => '1988-01-09 17:57:18',
	    23 => '1985-05-02 03:19:03',
	    24 => '2003-12-02 07:33:10',
	    25 => '2003-11-21 05:19:38',
	    26 => '1979-01-14 19:16:07',
	    27 => '1978-01-24 11:52:31',
	    28 => '1985-02-07 04:42:43',
	    29 => '1997-03-17 09:37:18',
	);

	function filtrate_dates($dates_array){
		$current_date = new DateTime("now", new DateTimeZone('Europe/Vilnius'));
		foreach ($dates_array as $date) {
			$another_dates = new DateTime($date, new DateTimeZone('Europe/Vilnius'));
			$difference = $another_dates->diff($current_date);
			if($difference->format("%y") < 5){
				echo $date."<br>";
			}
		}
	}
	filtrate_dates($dates);

?>


</body>
</html>