<?php
/**
 * Created by PhpStorm.
 * User: sharewood
 * Date: 20/04/15
 * Time: 17:37
 */

namespace App\app\Table;

use App\core\Table\Table;

class CategorieTable extends Table{

    /**
     * Récupere les derniers articles
     * @return array
     */
    public function last($limit = 5)
    {
        return $this->query("
            SELECT article.id, article.titre, article.contenu, article.created_at, categorie.nom As categorie
            FROM article
            LEFT JOIN categorie ON article.categorie_id = categorie.id
            ORDER BY created_at DESC
            LIMIT $limit
        ");
    }

    public function findById($id){
        return $this->query("
            SELECT *
            FROM categorie
            WHERE id = ?
            ",
            [$id],
            true
        );
    }

} 