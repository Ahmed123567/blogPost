@extends('layouts.appUser')


@section('content')


<div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <h1 class="post-title">{{$post->metadata}}</h1>

        <p class="lead">{{$post->user->name}}</p>

        <hr />

        <p>
          <span class="glyphicon glyphicon-time"></span> {{$post->created_at}}
        </p>

        <hr />
       
        <p>
         {{$post->content}}
        </p>
        <hr>

        <h3>comments</h3> 
        @foreach ( $post->comment as $comment )
        @if ($comment->parent == -1)
        <img src="{{ asset('images/'. $comment->user->image) }}"  width="30px" class="img-circle elevation-2" alt="user image">
        <strong>{{$comment->user->name}}</strong>
       
        @if ($comment->user->id == Auth::user()->id)
            <a href="{{route('manage.comments.delete', [ 'comment_id'=> $comment->id]) }}" style="padding:30px;
                color:red; text_decorate:none;" >Delete</a>
          
        @endif    
       
        <p style="padding: 0 0 0 40px">
           {{$comment->content}}
        </p>
            
        <hr>
        @endif
        @endforeach
      
       

        <hr />
        
            <div class="well" style="background-color: rgb(112, 112, 176)">
                <h4 style="color: white">Leave a Comment:</h4>
                <form action="{{route('user.main.comment.replyStore')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <textarea class="form-control" name="content" rows="3"></textarea>
                    @error('content')
                            <div class="error" style="color: red">{{ $message }}</div>
                    @enderror

                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="parent" value="{{$comment_reply->id}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        

        <hr/>
      </div>
    </div>
  </div>


@endsection