@extends('layouts.appAdmin')

@section('title')
    Create Post
@endsection


@section('content')
    <div class="content-wrapper" style="background: none; padding:20px 60px ;">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Post</h3>
            </div>

            

            <form action="{{route('manage.post.store')}}" method="post" enctype="multipart/form-data"> 

                @csrf

                <div class="card-body">
                    
                    <div class="form-group">
                        <label for="name">topic</label> <span style="color: crimson">*</span>
                       
                        <textarea name="metadata" class="form-control" rows="5"></textarea>
                        @error('name')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    
                    <div class="form-group">
                        <label for="name">Content</label> <span style="color: crimson">*</span>
                       
                        <textarea name="content" class="form-control" rows="5"></textarea>
                        @error('name')
                            <div class="error" style="color: red">{{ $message }}</div>
                        @enderror
                        
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="customFile">                                <label class="custom-file-label" for="exampleInputFile">Choose  image</label>
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
