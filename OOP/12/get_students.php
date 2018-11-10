<?php
    require_once("dbcontroller.php");

    $db_handle = new DBController();

    if(!empty($_POST["id"])):
        $query ="SELECT * FROM students WHERE module_id = '" . $_POST["id"] . "'";
        $results = $db_handle->runQuery($query);
?>

    <option disabled selected value> -- Pasirinkite studentą -- </option>
	<?php foreach($results as $student): ?>
		<option value="<?php echo $student["id"]; ?>"><?php echo $student["surname"]; ?></option>
	<?php endforeach; ?>

<?php endif; ?>
