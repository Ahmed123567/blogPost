@extends('layouts.appUser')

@section('content')

<div class="container">
    <div class="main-body m-4">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <form action="{{route('main.image')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="file" name="image" class="upload-image"  onchange="form.submit()" style="display:none" > 
                      <input type="hidden"  name="user_id" value="{{Auth::user()->id}}">
                  </form>
                  <img src="{{ asset('images/'. Auth::user()->image) }}"
                     
                      class="rounded-circle" width="150"  style="cursor: pointer; border-radius:50%">     
                    <br><br>
                      <button class="btn btn-info"  onclick="$('.upload-image').trigger('click')">Upload image</button>
                 
                  </div>
                </div>
              </div>
           
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     {{Auth::user()->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::user()->email}}
                    </div>
                  </div>    
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Plan Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{Auth::user()->plantype}}
                    </div>
                  </div>     
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Number Of Posts</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if (Auth::user()->role == 'admin')
                        Infint
                      @else
                      {{Auth::user()->num_of_posts}}
                      @endif
                    </div>
                  </div>     
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Money</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{Auth::user()->money}}
                    </div>
                  </div>     
                </div>
              </div>

           
                     
                      
             



            </div>
          </div>

        </div>
    </div>

@endsection