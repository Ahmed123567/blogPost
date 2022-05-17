@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             
    <div class="container">
        <div class="row">
          <div class="col-lg-2"></div>
  
          <div class="col-lg-8 signup">
            <h1>Sign up</h1>
                    <form action="{{route('register')}}" method="post" class="signup-form">
                        @csrf
                        <div class="form-group">
                          <label for="username">Username</label>
                          <input
                          id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                          />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
            
                        <div class="form-group">
                          <label for="username">Email</label>
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
            
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
            
                        <div class="form-group">
                          <label for="password">Password Confirmation</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                        </div>
            
                        <button type="submit" class="btn btn-primary">Sign up</button>
                      </form>
                    </div>

                    <div class="col-lg-2"></div>
                  </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
