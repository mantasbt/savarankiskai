<?php 
    session_start(); 
    require "vendor/autoload.php";
    use AllClasses\Classes\Chuck;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Web servisai – API, REST, SOAP</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

<body>

<?php
    //nuskaitom Web servisą
    for($i=0; $i<10; $i++ ){
        $url = "https://api.chucknorris.io/jokes/random";
        $result = json_decode(file_get_contents($url));
        $res[] = $result;
    }

    //Įrašom naujus juokus į DB
    $newJokes = new Chuck($res);
    $newJokes -> saveJokes();

    $jokes = new Chuck;
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3">
        <?php
            echo "<p>".$_SESSION['message']."</p>";
            unset ($_SESSION['message']);
        ?>
        </div>

        <div class="col-md-6">
        <?php foreach($jokes -> getJokes() as $joke): ?>
            <div class="card">
                <div class="card-header">
                    <img src="<?php echo $joke['icon_url'] ?>"><span style="float:right">ID: <?php echo $joke['id'] ?></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $joke['value'] ?></h5>
                    <p class="card-text">Sukurta: <?php echo $joke['created_at'] ?></p>
                    <a href="<?php echo $joke['url'] ?>" target="_blank" class="btn btn-primary">Nuoroda</a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <div class="col-md-3"></div>
    </div>
</div>

</body>
</html>