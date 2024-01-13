<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemsMenu extends Model
{
    protected $fillable = ['title', 'path', 'parent', 'order', 'menu_id'];

    public function menu() {
    	return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
