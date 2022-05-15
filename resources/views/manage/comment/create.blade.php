@extends('layouts.appAdmin')

@section('title')
    Create Comment
@endsection


@section('content')
    <div class="content-wrapper" style="background: none; padding:20px 60px ;">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Comment</h3>
            </div>


            <form action="{{route('manage.comments.store')}}" method="post" enctype="multipart/form-data"> 

                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Content</label> <span style="color: crimson">*</span>
                       
                        <textarea name="content" class="form-control" rows="5"></textarea>
                        @error('name')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>
                  
                    <div class="form-group">
                        <div class="input-group">
                            <div class="col-4">
                                <label for="exampleInputFile">Owner</label>

                                <select name="user_id" class="form-control">
                                    @foreach ($users as  $user)
                                        <option value="{{$user->id}}"> {{$user->name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4"> 
                                <label for="exampleInputFile">Post</label>

                                <select name="post_id" class="form-control">
                                    @foreach ($users as  $user)
                                        <option value="{{$user->id}}"> {{$user->name}}</option>    
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label for="exampleInputFile">Parent</label>

                                <select name="parent" class="form-control">
                                    <option value="-1">-1</option>
                                    @foreach ($comments as  $comment)
                                        @if ($comment->parent == -1)
                                            <option value="{{$comment->id}}"> {{$comment->id}}</option>                                                
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>
                   
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection


@push('scripts')
    <script>

    </script>
@endpush
