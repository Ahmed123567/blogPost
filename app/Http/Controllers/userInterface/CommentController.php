<?php

namespace App\Http\Controllers\userInterface;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentStore(CommentRequest $req){

        $data = $req -> all();

        Comment::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'post_id' => $data['post_id'],
            'parent' => $data['parent']
        ]);

        return redirect()->back();
    }


    public function edit($comment_id, $post_id){

        return view('userInterface.comment.edit', [
            
            'comment' => Comment::find($comment_id),
            'post' => Post::find($post_id)
        ]);


    }


    public function update(CommentUpdateRequest $req){

        $data = $req -> all();

        Comment::find($data['comment_id'])->update([
            'content' => $data['content']
        ]);

        return redirect()->route('user.main.post', ['post_id' => $data['post_id']]);

    }


    public function reply($comment_id, $post_id){
        // dd($comment_id);
        // dd(Comment::find($comment_id));
        return view('userInterface.comment.reply', [
            
            'comment_reply' => Comment::find($comment_id),
            'post' => Post::find($post_id)
        ]);


    }

    public function replyStore(Request $req){

        $data = $req -> all();
        
        Comment::create([
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'post_id' => $data['post_id'],
            'parent' => $data['parent']
        ]);

        return redirect()->route('user.main.post', ['post_id' => $data['post_id']]);

    }


}
