<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['user_id','title','content','post_image'];

    public function user()
    {
        return hasOne(User::class);
    }
}
