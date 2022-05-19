<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Trait\cleanCodeTrait;
use App\Trait\helperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    use helperTrait;
    use cleanCodeTrait;

    public function index($post_id){


        return view('userInterface.post.showPost',
        [
            'post' =>  Post::find($post_id),

        ]
    );
    }


    public function create(){
        return view('userInterface.post.create');
    }


    public function store(StorePostRequest $req){

        $data = $req->all();

        
        if ($req->file('image') == null) {
            $imageName = null;
        } else {
           
            $imageName = $this->imageUpload($req);
        }


        Post::create([
            'content' => $data['content'],
            'metadata' => $data['metadata'],
            'user_id' => $data['user_id'],
            'image' => $imageName
        ]);

        if(Auth::user()->role == 'user'){
            
            $num = Auth::user()->num_of_posts; 

            User::find(Auth::user()->id)->update([
                'num_of_posts' => $num -1
            ]);
        }
        

        return redirect()->back();

    }


    public function pin($post_id){

        $pin = Post::find($post_id)->pin;

        if($pin == 1){
            $pin = 0;
        }else{
            $pin = 1;
        }

        Post::find($post_id)->update([
            'pin' => $pin
        ]);

        return redirect()->back();

    }


}
