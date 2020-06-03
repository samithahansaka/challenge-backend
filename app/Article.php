<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'url',
        'content'
    ];
}
