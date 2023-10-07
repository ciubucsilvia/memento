<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	protected $fillable = ['name', 'body', 'image', 'site_title', 'site_path', 'order'];
}
