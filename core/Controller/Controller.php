<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 22/04/15
 * Time: 15:19
 */

namespace App\core\Controller;


class Controller {

    protected $viewPath;
    protected $layout;

    public function __construct()
    {
        $this->viewPath = ROOT.'/app/Views';
    }

    protected function render($view, $variables = []){
        extract($variables);
        $view = str_replace('.','/',$view);
        ob_start();
        require $this->viewPath.'/'.$view.'.php';
        $content = ob_get_clean();

        require $this->viewPath.'/layout/'. $this->layout. '.php';
    }

    protected function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        header('Location:index.php?page=404');
        die();
    }

    protected function forbidden()
    {
        header('HTTP/1.0 403 Forbidden');
        header('Location:index.php?page=login');
        die();
    }

} 