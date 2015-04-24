<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 23/04/15
 * Time: 12:03
 */

namespace App\core\Session;


class Flash {

    /**
     * @var SessionInterface
     */
    private $session;
    private $uniqid;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
        $this->uniqid = uniqid();
    }

    public function set($message, $type = 'success')
    {
        $this->session->set('flash', [$message,$type]);
    }

    public function get()
    {
        $flash = $this->session->get('flash');
        $this->session->delete('flash');
        return $flash;
    }

} 