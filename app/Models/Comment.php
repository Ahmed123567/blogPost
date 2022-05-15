<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
    protected $table = 'comments';



    public $fillable = [
        'content',
        'user_id',
        'post_id',
        'parent'
    ];


    
    public function user(){

        return $this->belongsTo(User::class, 'user_id');
        
    }


}