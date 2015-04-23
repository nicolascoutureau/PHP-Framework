<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 14:54
 */

namespace App\core\Auth;


use App\core\Database\Database;
use App\core\Session\SessionInterface;

class DBAuth {

    private $db;
    private $session;

    public function __construct(Database $db, SessionInterface $session){
        $this->db = $db;
        $this->session = $session;
    }

    public function login($username,$password){
        $user = $this->db->prepare('SELECT * FROM user WHERE username = ?', [$username], null, true);
        if($user){
            if($user->password === sha1($password)){
                $this->session->set('auth', $user->id);
                return true;
            };
        }

        return false;
    }

    public function logout()
    {
        $this->session->delete('auth');
    }

    public function logged(){
        return !is_null($this->session->get('auth'));
    }

    public function getUserId()
    {
        if($this->logged()){
            return $this->session->get('auth');
        }

        return false;
    }

    public function getUser()
    {
        if($this->logged()){
            $user = $this->db->prepare('SELECT * FROM user WHERE id = ?', [$this->session->get('auth')], null, true);
            var_dump($user);
        }

        return false;
    }


} 