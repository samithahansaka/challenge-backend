<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'author_id',
        'title',
        'url',
        'content',
        'createdAt',
        'updatedAt'
    ];

    /**
     * Get the author that owns the article.
     */
    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    /**
     * Get the article content
     *
     * @param  string  $value
     * @return string
     */
    public function getContentAttribute($value)
    {
        return substr($value, 0, 12)."...";
    }
}
