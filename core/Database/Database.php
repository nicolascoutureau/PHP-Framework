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
    private $uniqid;

    public function __construct($db_name, $db_user, $db_password, $db_host)
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
        $this->uniqid = uniqid();
    }

    private function getPDO()
    {
        if(is_null($this->pdo)){
            $this->pdo = new \PDO("mysql:dbname=$this->db_name;host=$this->db_host", $this->db_user, $this->db_password );
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }

        return $this->pdo;
    }

    public function query($statement, $class_name = null, $one = false){
        $req = $this->getPDO()->query($statement);

        if(
            strpos($statement,'UPDATE') === 0 ||
            strpos($statement,'INSERT') === 0 ||
            strpos($statement,'DELETE') === 0
        ){
            return $req;
        }

        if(is_null($class_name)){
            $req->setFetchMode(\PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function prepare($statement, $attributes, $class_name = null, $one = false){
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);

        if(
            strpos($statement,'UPDATE') === 0 ||
            strpos($statement,'INSERT') === 0 ||
            strpos($statement,'DELETE') === 0
        ){
            return $res;
        }

        if(is_null($class_name)){
            $req->setFetchMode(\PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(\PDO::FETCH_CLASS, $class_name);
        }

        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll(\PDO::FETCH_CLASS, $class_name);
        }

        return $datas;
    }

    public function lastInsertId()
    {
        return $this->getPDO()->lastInsertId();
    }

} 