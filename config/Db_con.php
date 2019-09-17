<?php
class Db_con{
    function db_conect(){
            $pdo = new PDO('mysql:host=us-cdbr-iron-east-02.cleardb.net;dbname=heroku_fa4a0e04a39f301;charset=utf8', 'b3be37bc346701', '4bdbd3d9..', array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ));
        return $pdo;
    }
}