<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    

    <title>Tech Blog</title>

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" />

    <link href="{{url('css/style.css')}}" rel="stylesheet" />
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
   
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button
              type="button"
              class="navbar-toggle"
              data-toggle="collapse"
              data-target="#bs-example-navbar-collapse-1"
            >
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="{{ route("user.main")  }}">Tech Blog</a>


          </div>
  
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                  
            @if (Auth::user()->role == 'admin')
            <li class="nav-item dropdown mr-sm-2">
              <a  href="{{route('manage.index')}}">Admin</a>
            </li>
              
            @endif

            <li class="nav-item dropdown  mr-sm-2">
              <a href="{{route('user.main.post.create')}}">Post</a>
            </li>
           
            <li class="nav-item dropdown  mr-sm-2">
              <a href="{{route('main.profile.index')}}">Profile</a>
            </li>

            @if (Auth::user()->role == 'user')
              <li class="nav-item dropdown  mr-sm-2">
                <a href="{{route('user.main.contact')}}">Contact me</a>
              </li>  
            @endif
            

                <li class="nav-item dropdown  mr-sm-2">
                   
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
                              
            </ul>
           
          </div>
        </div>
      </nav>

    

      @yield('content')

      @stack('scripts')
      <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"
       integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
       <script src="https://kit.fontawesome.com/94efbe3b18.js" crossorigin="anonymous"></script>
       <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
       
    <script src="{{url('js/jquery.js')}}"></script>

    <script src="{{url('js/bootstrap.min.js')}}"></script>
  </body>
</html>
