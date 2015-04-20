<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:36
 */

namespace App\app\Table;

use App\app\Database\Database;

class Table {

    private $table;
    private $db;

    public function __construct(Database $db){
        $this->db = $db;

        $parts = explode('\\', get_class($this));
        $class = end($parts);
        $this->table = strtolower(str_replace('Table','',$class));
    }

    public function all(){
        return 'all';
    }
} 