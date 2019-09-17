<?php
class Db_con{
    function db_conect(){
            $pdo = new PDO('mysql:host=localhost;dbname=newsone;charset=utf8', 'root', '', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));
        return $pdo;
    }
}