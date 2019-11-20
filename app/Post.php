<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use \Astrotomic\Translatable\Translatable,
        Sluggable;

    protected $table = 'posts';

    protected $fillable = [
        'slug',
        'user_id',
    ];

    public $translatedAttributes = [
        'title',
        'description'
    ];

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Route model binding
     * Como acceder de manera automatica.
     */

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
