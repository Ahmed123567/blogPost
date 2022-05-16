@extends('layouts.appAdmin')

@section('title')
    edit Post
@endsection


@section('content')
    <div class="content-wrapper" style="background: none; padding:20px 60px ;">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
            </div>


            <form action="{{route('manage.post.update')}}" method="post" enctype="multipart/form-data"> 

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Topic</label> <span style="color: crimson">*</span>
                       
                        <textarea name="metadata" class="form-control" rows="5">{{$post->metadata}}</textarea>
                        @error('content')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>


                    <div class="form-group">
                        <label for="name">Content</label> <span style="color: crimson">*</span>
                       
                        <textarea name="content" class="form-control" rows="5">{{$post->content}}</textarea>
                        @error('content')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>
                
                   
                  
                  
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                        
                  <br>
                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection


