<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

  
    public $fillable = [
        'content',
        'user_id',
        'metadata',
        'image'
    ];



    public function user(){

        return $this->belongsTo(User::class, 'user_id');
        
    }

    public function comment(){
        return $this->hasMany(Comment::class , 'post_id');
    }

}
