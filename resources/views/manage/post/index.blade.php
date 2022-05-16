@extends('layouts.appAdmin')

@section('title')
    Manage posts
@endsection


@section('content')

<div class="content-wrapper" style="background: none; padding:20px 60px ;">

    <a  href="{{route('manage.post.create')}}"> <button class="btn btn-info btn-sm" style="margin: 0 0 20px 0">Create Post</button></a>

    <div class="col col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Latest Posts </h3>
            </div>

            <div class="card-body p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>topic</th>
                            <th>content</th>
                            <th style="width: 160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach( $posts  as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                                
                            <td> {{$post->metadata}}</td>
                            
                            <td> {{$post->content}}</td>

                            <td>
                                <a href="">
                                    <span class="badge bg-info">View</span>
                                </a>
                                <a href="{{route('manage.post.edit' ,['post_id' => $post->id ])}}">
                                    <span class="badge bg-success">Edit</span>
                                </a>
                                <a href="{{route('manage.post.delete' ,['post_id' => $post->id ])}}" onclick="return confirm('Are You Sure?')">
                                    <span class="badge bg-danger">Delete</span>
                                </a>
                            </td>
                                                    
                       </tr>
                      @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div> 
</div>
        

</div> 


@endsection

