<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 21/04/15
 * Time: 10:41
 */

namespace App\app\Entity;

use App\core\Entity\Entity;


class CategorieEntity extends Entity{

    public function getUrl()
    {
        return "/article/categorie/$this->id";
    }
}