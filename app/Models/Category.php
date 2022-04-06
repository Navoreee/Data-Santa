<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //Define relationship Posts 0|* - 1 Categories
    function post(){
        return $this->hasMany(Post::class);
    }
}
 