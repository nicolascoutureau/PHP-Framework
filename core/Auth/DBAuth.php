<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 14:54
 */

namespace App\core\Auth;


use App\core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username,$password){
        $user = $this->db->prepare('SELECT * FROM user WHERE username = ?', [$username], null, true);
        if($user){
            if($user->password === sha1($password)){
                $_SESSION['auth'] = $user->id;
                return true;
            };
        }

        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }

    public function getUserId()
    {
        if($this->logged()){
            return $_SESSION['auth'];
        }

        return false;
    }

} 