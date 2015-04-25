<?php

namespace App\Core\Tools;


use App\core\Database\Database;

/**
 * Created by PhpStorm.
 * User: nicolascoutureau
 * Date: 25/04/15
 * Time: 21:13
 */

class Slug {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function slugify($value)
    {
        return $this->replaceChars($value);
    }

    public function replaceChars($value)
    {
        return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($value)));
    }

} 