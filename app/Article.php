<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'alias', 'keywords', 'meta_desc', 'image', 'body', 
                            'published', 'category_id', 'user_id'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
        // return $this->morphMany('App\Category', 'categoryable');
    }

	public function comments() {
    	return $this->hasMany('App\Comment');
    } 


}
