<?php
namespace AllClasses\Classes;

use AllClasses\Database\Db;
use PDO;

class Fakeris extends Db
{
    var $records;

    public function __construct($res){
        $this->getDb();
        $this->records = $res;
    }

    public function saveRecords(){
        foreach($this->records as $record){
            $pdo = $this->getDb();
            $sql = "INSERT INTO comments (author, comment, created_at) VALUES (:author, :comment, :created_at)";
            $res = $pdo->query($sql);

            $this->query($sql, [
                'author' => $record->author,
                'comment' => $record->comment,
                'created_at' => $record->created_at
            ]);
        }
    }

    public function getRecords($author, $limit){
        $sql = "SELECT * FROM comments WHERE author LIKE '%$author%' LIMIT $limit";
        $res = $this->query($sql, [])->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}