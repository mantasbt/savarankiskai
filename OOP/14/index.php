<?php  
    require("vendor/autoload.php");

    use AllClasses\Classes\Fakeris;

    for ($i=0;  $i < 5; $i++) { 
        $faker = Faker\Factory::create();
        $data = (object)[
            'author' => $faker->name,
            'comment' => $faker->text,
            'created_at' => $faker->date
        ];
        $res[] = $data;
    }

    $records = new Fakeris($res);
    $records->saveRecords();

    $author = "a";
    $limit = 10;

    $allRecords = $records->getRecords($author, $limit);

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    echo json_encode($allRecords, JSON_PRETTY_PRINT);
?>
