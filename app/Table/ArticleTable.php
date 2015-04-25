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
            SELECT article.id, article.titre, article.slug, article.contenu, article.created_at, categorie.nom As categorie
            FROM article
            LEFT JOIN categorie ON article.categorie_id = categorie.id
            ORDER BY created_at DESC
            LIMIT $limit
        ");
    }

    public function findById($id){
        return $this->query("
            SELECT article.id, article.titre, article.slug, article.contenu, article.image, article.created_at, categorie.nom As categorie
            FROM article
            LEFT JOIN categorie ON article.categorie_id = categorie.id
            WHERE article.id = ?
            ",
            [$id],
            true
        );
    }

    public function findLastByCategoryId($id){
        return $this->query("
            SELECT article.id, article.titre, article.slug, article.contenu, article.image, article.created_at
            FROM article
            LEFT JOIN categorie ON article.categorie_id = categorie.id
            WHERE categorie.id = ?
            ",
            [$id]
        );

    }

    public function all(){
        return $this->query("
            SELECT article.id, article.titre, article.slug, article.contenu, article.image, article.created_at, categorie.nom as categorie
            FROM {$this->table}
            LEFT JOIN categorie ON categorie.id = article.categorie_id
        ");
    }

    public function paginate($p)
    {
        $per_page = 5;
        $p = $per_page * ($p - 1);

        return $this->query("
            SELECT article.id, article.titre, article.slug, article.contenu, article.created_at, article.image, categorie.nom As categorie
            FROM article
            LEFT JOIN categorie ON article.categorie_id = categorie.id
            ORDER BY created_at DESC
            LIMIT $per_page
            OFFSET $p
            "
        );
    }

} 