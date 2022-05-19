@extends('layouts.appUser')

@section('content')
 <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 newpost">
        <h1>Contact me</h1>
        <form action="{{route('user.main.sendEmail')}}" method="post" enctype="multipart/form-data" class="newpost-form">
         
         @csrf
           <div class="form-group">
            <label for="content">Send Email</label>
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
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

          <button type="submit" class="btn btn-primary">Send</button>
        </form>
      </div>
    </div>
  </div> 

@endsection

