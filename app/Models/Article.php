<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'title', 
        'alias', 
        'meta_desc', 
        'image', 
        'body', 
        'published', 
        'category_id', 
        'user_id'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('alias');
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function category() {
    	return $this->belongsTo(Category::class);
        // return $this->morphMany('App\Category', 'categoryable');
    }

	public function comments() {
    	return $this->hasMany(Comment::class);
    } 

    public function getComments() {
        return $this->comments->groupBy('parent_id');
    }


}
