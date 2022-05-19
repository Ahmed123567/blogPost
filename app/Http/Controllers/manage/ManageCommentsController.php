<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Trait\cleanCodeTrait;
use App\Trait\helperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\ViewName;
use Laravel\Ui\Presets\React;

class ManageCommentsController extends Controller
{

    use cleanCodeTrait;
    use helperTrait;
    public function index(Request $request){

        // dd(Comment::latest()->get());

        if ($request->ajax()) {
            $data = Comment::latest()->get();

            // userDataTables is a function from cleanCodeTrait

            return $this->commentsDataTables($data);
        }


        return view('manage.comment.index');
    }




    public function create(){

        $post = Post::first();
        $first_comments =   Comment::where( 'post_id',$post->id )->where('parent' , -1)->get();;

        return view('manage.comment.create' , 
        [
            'users' =>  User::all(),
            'comments' => $first_comments,
            'posts' => Post::all()
        ]
    ); 
    }


    public function store(Request $req){

        if($req -> ajax()){
          
            $comments = Comment::where( 'post_id', $req->all()['post_id'])->where('parent' , -1)->get();
           foreach ($comments as $comment){
            
            $comment->username = $comment->user->name;
           
        }
           return response()->json($comments);
        }   

        $data = $req -> all();
         

        Comment::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'post_id' => $data['post_id'],
            'parent' => $data['parent']
        ]);

        return redirect()->back();

    }

    public function edit($comment_id){
      
    
        return view('manage.comment.edit', 
        [
            'commente' => Comment::find($comment_id),
            'users' => User::all(),
            'comments' => Comment::all()
        ]
    );
     
    }

    public function update(Request $req){

        $data = $req -> all();

        Comment::find($data['comment_id'])->update([
            
            'content' => $data['content'],
            ]);

            return redirect()->back();

    }

    public function delete($comment_id){

        Comment::find($comment_id)->delete();

        Comment::where('parent' , $comment_id)->delete();

        return redirect()->back();
    }

}
