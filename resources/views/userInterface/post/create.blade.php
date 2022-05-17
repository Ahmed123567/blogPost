@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 newpost">
        <h1>New post</h1>

        <form action="{{route('user.main.post.store')}}" method="post" enctype="multipart/form-data" class="newpost-form">
         
         @csrf
            <div class="form-group">
            <label for="subject">Subject</label>
            <input
              type="text"
              id="subject"
              name="metadata"
              class="form-control"
              placeholder="Type the subject here"
            />
            @error('metadata')
                <p style="color: red" >{{$message}}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea
              rows="5"
              id="content"
              name="content"
              class="form-control"
              placeholder="Type the content"
            ></textarea>
            @error('content')
               <p style="color: red" >{{$message}}</p>
            @enderror
          </div>
         
          <button  class="btn btn-info img-btn">Upload image</button>
          <br><br>
          <div class="input-group mb-3" style="display: none">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input form-control" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

          <button type="submit" class="btn btn-primary">Post</button>
        </form>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>

@endsection

@push('scripts')
    <script>
        let img_btn = document.querySelector('.img-btn')
        let file_input = document.querySelector('.custom-file-input')

        img_btn.onclick = (e)=>{
            e.preventDefault()
            file_input.click()
        }

    </script>
@endpush