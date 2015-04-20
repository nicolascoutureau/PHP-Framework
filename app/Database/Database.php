<?php
/**
 * Created by PhpStorm.
 * User: nicolascoutureau
 * Date: 20/04/15
 * Time: 20:48
 */

namespace App\app\Database;


class Database {

    private $db_name;
    private $db_user;
    private $db_password;
    private $db_host;

    public function __construct($db_name, $db_user, $db_password, $db_host)
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
    }

} 