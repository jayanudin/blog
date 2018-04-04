<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'content', 'slug', 'category_id'];	
    protected $table = 'posts';

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
