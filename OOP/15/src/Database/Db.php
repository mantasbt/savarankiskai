<?php 
namespace AllClasses\Database;
use PDO;
use Exception;

abstract class Db
{
    const HOST = "localhost";
    const USER = "root";
    const PASSWORD = "";
    const DB = "mailer";

    protected function getDb(){
        try{
            return new PDO('mysql:host=localhost; dbname=mailer', 'root', '');
        }
        catch(Exception $e){
            echo 'Nepavyko prisijungti prie DB.';
            exit;
        }
    }

    protected function query($sql, $params=[]){
        $sth = $this->getDb()->prepare($sql);
        $sth->execute($params);

        return $sth;
    }
}