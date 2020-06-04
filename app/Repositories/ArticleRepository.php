<?php

namespace App\Repositories;

use App\Article;
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
     * @param $id
     * @return mixed
     */
    public function getArticleById($id)
    {
        return $this->show($id);
    }

    public function getAllArticles()
    {
        return $this->all();
    }
}
