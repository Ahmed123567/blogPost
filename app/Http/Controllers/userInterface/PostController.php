<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Trait\cleanCodeTrait;
use App\Trait\helperTrait;
use Illuminate\Http\Request;

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

        return redirect()->back();

    }

}
