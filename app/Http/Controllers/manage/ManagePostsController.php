<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Trait\cleanCodeTrait;
use App\Trait\helperTrait;
use Illuminate\View\ViewName;
use Laravel\Ui\Presets\React;
use App\Models\User;

class ManagePostsController extends Controller
{
    use cleanCodeTrait;
    use helperTrait;
    public function index(Request $request){

        // dd(Post::latest()->get());

        
            $data = Post::latest()->get();

        return view('manage.post.index',

        [
            'posts'=>$data
        ]
    
    
    );
    }




    public function create(){

        return view('manage.post.create' , 
        [
            'users' =>  Post::all(),
            'posts' => Post::all()
        ]
    ); 
   

    }


    public function store(Request $req){

      
       
        $data = $req -> all();

        //dd($data);
        if ($req->file('image') == null) {
            $imageName = '';
        } else {
           
            $imageName = $this->imageUpload($req);
        }

    
        

        Post::create([
            'content' => $data['content'],
            'user_id' =>auth()->id(),
            'metadata' => $data['metadata'],
            'image'=>$imageName
        ]);

        return redirect()->route('manage.post.index');

    }

    public function edit($post_id){

    //dd(Post::find($post_id));
      
    
        return view('manage.post.edit', 
        [
            
            'id' => $post_id,
            'post' => Post::find($post_id),
            'users' => User::all(),
            'comments' => Post::all()
        ]
        );
        }

    public function update(Request $req){

        $data = $req -> all();

        //dd($data);        

        Post::find($data['post_id'])->update([
            
            'content' => $data['content'],
            'metadata' => $data['metadata'],
            
        ]);

            return redirect()->route('manage.post.index');

    }

     public function delete($post_id){

         Post::find($post_id)->delete();

     return redirect()->back();
    }

}
