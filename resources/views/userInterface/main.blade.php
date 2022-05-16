
@extends('layouts.appUser')

@section('content')

    <div class="container">
      <div class="row">
          @foreach ($posts as $post )
            <div class="col-md-6">
                <h2 class="post-title">
                   <p style="text-decoration: none">{{$post->metadata}}</p>
                </h2>
                <p class="lead">{{$post->user->name}}</p>
                <p>
                    {{$post->content}}
                </p>
                <p>
                <span class="glyphicon glyphicon-time"></span> 
                {{ $post->create }}
                </p>
                   <a class="btn btn-default" href="{{route('user.main.post' , ['post_id' => $post->id])}}">Read More</a>
            </div>
            
          @endforeach
     
        </div>


      <hr />

      <h5>Pagination:</h5>
      <div style="background: none; color:white !important;">
        {{ $posts->links() }}
      </div>
      <br><br><br>
    </div>

   @endsection