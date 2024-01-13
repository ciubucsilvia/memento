<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'email', 'site', 'article_id', 'user_id', 'parent_id', 'body'];

    public function article() {
    	return $this->belongsTo(Article::class, 'article_id', 'id');
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function getHash()
    {
        $hash = isset($this->email) ? md5($this->email) : md5($this->user->email);
        return $hash;
    }
}
