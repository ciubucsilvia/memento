<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['title', 'alias', 'keywords', 'meta_desc', 'body', 
    						'sort', 'published'];
}
