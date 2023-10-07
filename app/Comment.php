<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'site', 'article_id', 'user_id', 'parent_id', 'body'];

    public function article() {
    	return $this->belongsTo('App\Article', 'article_id', 'id');
    }

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
