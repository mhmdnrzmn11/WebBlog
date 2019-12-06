<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title', 'category_id', 'thumbnail', 'content', 'date', 'author_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

    public function category()
    {
        return $this->belongsTo('App\PostCategory');
    }
}
