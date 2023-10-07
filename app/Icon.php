<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $fillable = ['class', 'title', 'link', 'order', 'icon'];
}
