<?php
/**
 * Created by PhpStorm.
 * User: nicolascoutureau
 * Date: 20/04/15
 * Time: 20:48
 */

namespace App\core\Database;


class Database {

    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user, $db_password, $db_host)
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if(is_null($this->pdo)){
            $this->pdo = new \PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_password );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    public function query($statement, $class_name = null){
        $req = $this->getPDO()->query($statement);

        if(is_null($class_name)){
            $req->setFetchMode(\PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        }

        return $req->fetchAll();
    }

} 