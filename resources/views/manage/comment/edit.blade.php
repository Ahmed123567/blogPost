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


            <form action="{{route('manage.comments.update')}}" method="post" enctype="multipart/form-data"> 

                @csrf

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Content</label> <span style="color: crimson">*</span>
                       
                        <textarea name="content" class="form-control" rows="5">{{$commente->content}}</textarea>
                        @error('content')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>
                  
                  
                            <input type="hidden" name="comment_id" value="{{$commente->id}}">
                        
                  <br>
                   
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
