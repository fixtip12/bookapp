<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'user_id','impression','image_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
