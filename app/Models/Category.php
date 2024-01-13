<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug;
    
    protected $fillable = [
        'title', 
        'alias',
        'type', 
        'parent_id'
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

    public function portfolios() {
    	return $this->hasMany(Portfolio::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
