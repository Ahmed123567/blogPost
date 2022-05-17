@extends('layouts.appUser')


@section('content')


<div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <h1 class="post-title">{{$post->metadata}}</h1>

        <img src="{{ asset('images/'. $post->user->image) }}"  width="30px" style="border-radius: 50%" alt=""> 
        <span style="font-size: 18px; padding: 0 0 0 10px">{{$post->user->name}}</span>

        <a style="padding: 0 0 0 50px; " style="cursor: pointer" class="show-reply" >Show/hide replies</a>
        <hr />
         
  
        <p>
          <span class="glyphicon glyphicon-time"></span> {{$post->created_at}}
        </p>

        <hr />
       
        <p>
         {{$post->content}}
        </p>
        @if ($post->image != null)
        <img src="{{ asset('images/'. $post->image) }}" height="100px" width="150px" alt=""> 
        @endif
        <hr>

        <h3>comments</h3> 
        @foreach ( $post->comment as $comment )
          @if ($comment->parent == -1)
          <div>
            <img src="{{ asset('images/'. $comment->user->image) }}"  width="30px" class="img-circle elevation-2" alt="user image">
            <strong>{{$comment->user->name}}</strong>
            
            <a href="{{route('user.main.comment.reply', [ 'comment_id'=> $comment->id  , 'post_id' => $post->id]) }}" style="padding: 0 0 0px 30px;
              color:grey; text_decorate:none;" >Reply</a>

            @if ($comment->user->id == Auth::user()->id)
                <a href="{{route('manage.comments.delete', [ 'comment_id'=> $comment->id]) }}" style="padding:0  0 0 10px;
                    color:red; text_decorate:none;" >Delete</a>
                  <a href="{{route('user.main.comment.edit', [ 'comment_id'=> $comment->id , 'post_id' => $post->id]) }}" style="padding:0  0 0px 10px; 
                    color:blue; text_decorate:none;" >Edit</a>
            @endif    
          
            <p style="padding: 0 0 0 40px">
              {{$comment->content}}
            </p>
          </div> 
            <hr>
          
        
          @endif

          
          @foreach ($post->comment as $comment_reply )
            @if ($comment_reply->parent == $comment->id )
            <div class="comment-reply" style="padding:  0 0 0 40px; display:none; ">                
                  <img src="{{ asset('images/'. $comment_reply->user->image) }}"  width="30px" class="img-circle elevation-2" alt="user image">
                  <strong>{{$comment_reply->user->name}}</strong>
                  
                    @if ($comment_reply->user->id == Auth::user()->id)
                        <a href="{{route('manage.comments.delete', [ 'comment_id'=> $comment->id]) }}" style="padding:0  0 0 10px;
                            color:red; text_decorate:none;" >Delete</a>
                          <a href="{{route('user.main.comment.edit', [ 'comment_id'=> $comment->id , 'post_id' => $post->id]) }}" style="padding:0  0 0px 10px; 
                            color:blue; text_decorate:none;" >Edit</a>
                    @endif    
                <span style="padding: 0 0 0 20px;">
                  reply to : {{ $comment->user->name}}

                </span>
                  <p style="padding: 0 0 0 40px">
                    {{$comment_reply->content}}
                  </p>
                    
                <hr>
              
                
              
            </div>
          @endif
        @endforeach

         
         
        @endforeach
      
       

        <hr />
        
            <div class="well" style="background-color: rgb(112, 112, 176)">
                <h4 style="color: white">Leave a Comment:</h4>
                <form action="{{route('user.main.comment')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <textarea class="form-control" name="content" rows="3"></textarea>
                    @error('cpntent')
                            <div class="error" style="color: red">{{ $message }}</div>
                    @enderror
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="parent" value="-1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        

        <hr/>
      </div>
    </div>
  </div>


@endsection


@push('scripts')
  <script>
    let showreply = document.querySelector('.show-reply');
    let div = document.querySelectorAll('.comment-reply');

    showreply.onclick = () =>{
      div.forEach(e => {
        if (e.style.display == 'none'){
          e.style.display = 'block'
        }else{
          e.style.display = 'none'
        }
      });
    }
  </script>
@endpush