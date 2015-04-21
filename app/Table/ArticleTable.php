<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:37
 */

namespace App\app\Table;

use App\core\Table\Table;

class ArticleTable extends Table{

    /**
     * Récupere les derniers articles
     * @return array
     */
    public function last($limit = 5)
    {
        return $this->query("
            SELECT * FROM article
            ORDER BY created_at DESC
            LIMIT $limit
        ");
    }

} 