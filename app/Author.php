<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author';

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get the article record associated with the author.
     */
    public function article()
    {
        return $this->hasMany('App\Article');
    }
}
