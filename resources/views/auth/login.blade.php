@extends('layouts.appUser')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                    <div class="container">
                        
                        <div class="row">
                          <div class="col-lg-2"></div>
                  
                          <div class="col-lg-8 login">
                            <h1>Login</h1>
                  
                            <form action=" {{route('login')}}" method="post" class="login-form">
                              <div class="form-group">
                                
                                @csrf
                          
                                <label for="username">Email</label>
                                <input
                                id="Email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                  
                              <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                                />
                              </div>
                  
                              <div class="row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
    
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                              <button type="submit" class="btn btn-primary">Log in</button>
                            </div>
                           
                            </form>
                       
                          <div class="col-lg-2"></div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
