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
}
