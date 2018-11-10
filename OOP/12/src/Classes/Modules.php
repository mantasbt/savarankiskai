<?php
namespace AllClasses\Classes;

use AllClasses\Database\Db;
use PDO;

class Modules extends Db
    {
        public function getModules(){
            $pdo = $this->getDb();
            $sql = "SELECT * FROM modules";
            $res = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
    }