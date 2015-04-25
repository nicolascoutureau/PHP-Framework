<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 10:41
 */

namespace App\app\Entity;

use App\core\Entity\Entity;


class ArticleEntity extends Entity{

    Const IMAGEPATH = '/images/article/';

    public function getUrl()
    {
        return "/article/show/$this->id";
    }

    public function getExtrait($length=100)
    {
        return substr($this->contenu,0,$length).'...';
    }

    public function getImagepath()
    {
        return self::IMAGEPATH.$this->image;
    }



} 