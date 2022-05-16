<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function index(){

        return view('userInterface.main', [

            'posts' =>  Post::paginate(6),

        ]);
    }

    public function post($post_id){


        return view('userInterface.showPost',
        [
            'post' =>  Post::find($post_id),

        ]
    );
    }

   
}
