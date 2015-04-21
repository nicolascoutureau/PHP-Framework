<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:36
 */

namespace App\Core\Table;

use App\Core\Database\Database;

class Table {

    protected $table;
    private $db;

    public function __construct(Database $db){
        $this->db = $db;

        $parts = explode('\\', get_class($this));
        $class = end($parts);
        $this->table = strtolower(str_replace('Table','',$class));
    }

    public function all(){
        return $this->query("SELECT * FROM $this->table");
    }

    public function findById($id){
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?",[$id], true);
    }

    public function query($statement, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare(
                $statement,
                $attributes,
                str_replace('Table', 'Entity',get_class($this)),
                $one
            );
        } else{
            return $this->db->query(
                $statement,
                str_replace('Table', 'Entity',get_class($this)),
                $one
            );
        }
    }

    public function updateById($id, $fields){
        $sql_parts = [];
        $attributes = [];

        foreach($fields as $field => $value){
            $sql_parts[] = "$field = ?";
            $attributes[] = $value;
        }
        $attributes[] = $id;
        $sql_part = implode(',',$sql_parts);

        return $this->query("UPDATE {$this->table} SET $sql_part WHERE id=?", $attributes);

    }

    public function create($fields){
        $sql_parts = [];
        $attributes = [];

        foreach($fields as $field => $value){
            $sql_parts[] = "$field = ?";
            $attributes[] = $value;
        }
        $sql_part = implode(',',$sql_parts);

        return $this->query("INSERT INTO {$this->table} SET $sql_part", $attributes);

    }

    public function deleteById($id)
    {
        $this->query("DELETE FROM {$this->table} WHERE id =?", [$id]);
    }
} 