<?php

namespace App\Repositories;

use App\Article;
use App\Author;
use App\Interfaces\RepositoryInterface;

class ArticleRepository extends MainRepository implements RepositoryInterface
{
    /**
     * ArticleRepository constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        parent::__construct($article);
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function getArticle(array $parameters)
    {
        $records = $this->model->select('id', 'name');
        if (!empty($parameters['id'])) {
            $records = $records->where("id", $parameters['id']);
        }
        return $records->get();
    }
}
