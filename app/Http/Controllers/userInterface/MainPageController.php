<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainPageController extends Controller
{
    public function index(){

        return view('userInterface.main', [

            'posts' =>  Post::paginate(6),

        ]);
    }

    public function search(Request $req){
        $text = $req->all()['search'];

        
        $posts = DB::table('posts')->where('metadata', 'Like', '%'.$text . '%')->get();

        return response()->json($posts);
    
    }
   
   
}
