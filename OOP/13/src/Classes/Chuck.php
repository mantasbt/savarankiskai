<?php
namespace AllClasses\Classes;

session_start();

use AllClasses\Database\Db;
use PDO;

class Chuck extends Db
{
    var $jokes;

    public function __construct($res =[]){
        $this->getDb();
        $this->jokes = $res;
    }

    public function saveJokes(){
        foreach($this->jokes as $joke) {
            $pdo = $this->getDb();
            $sql = "SELECT * FROM records WHERE id = '$joke->id'";
            $res = $pdo->query($sql)->fetchAll(PDO::FETCH_OBJ);
            $same_jokes = 0;
            $new_jokes = 0;

            if($res){
                $same_jokes++;
                $_SESSION['same-joke'] = "Pasikartojusių juokų: " . $same_jokes;
                continue;
            }else{
                $sql = "INSERT INTO records (id, value, url, icon_url) VALUES (:id, :value, :url, :icon_url)";
                $this->query($sql, [
                    'id' => $joke->id,
                    'value' => $joke->value,
                    'url' => $joke->url,
                    'icon_url' => $joke->icon_url
                ]);
                $new_jokes++;
                $_SESSION['new-joke'] = "Naujų juokų: " . $new_jokes;
            }
        }
    }

    public function getJokes(){
        $sql = "SELECT * FROM records ORDER BY created_at DESC LIMIT 10";
        $res = $this->query($sql, [])->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}