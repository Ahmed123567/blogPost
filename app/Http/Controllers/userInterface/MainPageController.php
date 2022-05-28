<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainPageController extends Controller
{
    public function index(){

        return view('userInterface.main', [

            'posts' =>  Post::orderBy('pin' , 'desc')->orderBy('created_at' , 'asc')->paginate(6),
            'userCount' => User::where('role', 1)->count()

        ]);
    }

    public function search(Request $req){
        $text = $req->all()['search'];

        
        $posts = DB::table('posts')->where('metadata', 'Like', '%'.$text . '%')->get();

        return response()->json($posts);
    
    
    }

    public function premium(){
      

       User::find(Auth::user()->id)->update([
            'plantype' => 1,
            'num_of_posts' => 2,
            'money' => Auth::user()->money - 1000
        ]);
    
        return redirect()->back();
    }
   
   
}
