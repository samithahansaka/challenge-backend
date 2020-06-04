<?php
namespace App\Http\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * @param Article $article
     * @return array
     */
    public function transform(Article $article){
        return [
            'id' => $article->id,
            'author'=> $article->author->name,
            'title' => $article->title,
            'summary' => $article->content,
            'createdAt' => $article->createdAt
        ];
    }
}
