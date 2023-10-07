<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'alias', 'type', 'parent'];

    public function portfolios() {
    	return $this->hasMany('App\Portfolio');
    }

    // public function categoryable() {
    // 	return $this->morphTo();
    // }
}
