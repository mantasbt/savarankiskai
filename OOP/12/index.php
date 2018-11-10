<?php
    session_start();

    require "vendor/autoload.php";
    use AllClasses\Classes\Modules;
?>

<html>
<head>
<meta charset="utf-8">
    <title>Darbas Nr. 12</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script>
		function getStudent(val) {
			$.ajax({
				type: "POST",
				url: "get_students.php",
				data:'id='+val,
				success: function(data){
					$("#students-list").html(data);
				}
			});
		}
	</script>
</head>
<body>

<div class="container">
	<div class="row">

		<div class="col-md-6">
            <form action="data.php" method="POST">
                    <fieldset>
                    <legend style="text-align: center;">Naujas studentas</legend>

                    <div class="form-group">
                        <label for="student_no">Studento Nr.</label>
                        <input type="number" name="student_no" class="form-control" id="student_no" required></input>
                    </div>

                    <div class="form-group">
                        <label for="surname">Vardas</label>
                        <input type="text" name="surname" class="form-control" id="surname" required></input>
                    </div>

                    <div class="form-group">
                        <label for="forename">Pavardė</label>
                        <input type="text" name="forename" class="form-control" id="forename" required></input>
                    </div>

                    <button type="submit" name="new_student" class="btn btn-primary">Įkelti</button>

                    </fieldset>
                </form>

                <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                ?>
        </div>
        
        <div class="col-md-6">
            <form method="POST">
                <fieldset>
                    <legend style="text-align: center;">Pažymio įrašymas</legend>

                    <div class="form-group">
                        <label for="module">Modulis</label>
                        <select name="module" id="module-list" class="custom-select" onChange="getStudent(this.value);">
                            <option disabled selected value> -- Pasirinkite modulį -- </option>
                            <?php
                                $modules = new Modules;
                                foreach($modules->getModules() as $modules){
                                    echo "<option value=" .$modules["id"]. ">" . $modules["module_name"]. "</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="student">Studentas</label>
                        <select name="student" id="students-list" class="custom-select" >
                        <option disabled selected value> -- Pasirinkite studentą -- </option>
                        </select>
                    </div>

                    <button type="submit" name="new_mark" class="btn btn-primary">Įrašyti</button>

                </fieldset>
            </form>
        </div>
        
    </div>
</div>

</body>
</html>
