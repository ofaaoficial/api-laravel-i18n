<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use \Astrotomic\Translatable\Translatable;

    protected $table = 'posts';

    protected $fillable = [
        'slug',
        'user_id',
    ];

    public $translatedAttributes = [
        'title',
        'description'
    ];
}
