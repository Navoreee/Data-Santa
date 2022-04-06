<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'file_path',
        'tableau_link',
        'content',
        'status_id'
    ];

    //Define relationship Users 1 - 0|* Posts
    public function user(){
        return $this->belongsTo(User::class);
    }
    // Define relationship Category 1 - 0|* Posts
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
