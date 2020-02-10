<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        
        <title>Online Congress</title>
        <link
          rel="shortcut icon"
          type="image/x-icon"
          href="{{ asset('assets/img/ico.ico') }}"
        />
        
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"> 
        <link href="{{ url('assets/css/jumbotron.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/own.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/dragdrop.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/25b029b4bc.js"></script>
        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-secondary navbar-fixed-top">
            <!--<img class="congress" src="assets/img/congress1.png"></img>-->
                <a class="btn btn-outline-light my-2 my-sm-0 text big" style="font-weight:bold;letter-spacing:0.2rem;" href="{{ url('/') }}">ONLINE CONGRESS <span class="glyphicon glyphicon-globe"></span> </a>
           
            <div class="collapse navbar-collapse navflex" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                   
                </ul>
                <ul class="navbar-nav">
                  
                    @auth
                         @if(Auth::user()->type == 'admin')
                            <li class="nav-item active" style="padding-right:8px;">
                                <a class="btn btn-light my-2 my-sm-0 big" href="{{ url('admin') }}">Dashboard <i class="fa fa-cog" style="font-size:2.5rem" aria-hidden="true"></i> </a>
                            </li>
                         @endif
                         @if(Auth::user()->type == 'presentation')
                            <li class="nav-item active" style="padding-right:8px;">
                                <a class="btn btn-light my-2 my-sm-0 big" href="{{ url('user/' .Auth::user()->id. '/presentationCreate') }}">Add presentation <i class="fa fa-plus" style="font-size:2.5rem" aria-hidden="true"></i> </a>
                            </li>
                         @endif
                         @if(Auth::user()->type == 'admin')
                        <li class="nav-item active" style="padding-right:8px;">
                            <a class="btn btn-light my-2 my-sm-0 big" href="{{ url('user/' .Auth::user()->id. '/edit') }}">{{Auth::user()->type}} <i class="fa fa-user-plus" style="font-size:2.5rem" aria-hidden="true"> </i> </a>
                        </li>
                         @endif
                         @if(Auth::user()->type == 'presentation')
                        <li class="nav-item active" style="padding-right:8px;">
                            <a class="btn btn-light my-2 my-sm-0 big" href="{{ url('user/' .Auth::user()->id. '/edit') }}">{{Auth::user()->type}} <i class="fa fa-file-video-o" style="font-size:2.5rem" aria-hidden="true"> </i> </a>
                        </li>
                         @endif
                        <li class="nav-item active" style="padding-right:8px;">
                            <a class="btn btn-light my-2 my-sm-0 big" href="{{ url('user/' .Auth::user()->id. '/edit') }}">{{Auth::user()->name}} <i class="fa fa-user" style="font-size:2.5rem" aria-hidden="true"></i> </a>
                        </li>
                        <li class="nav-item active">
                            <form class="form-inline my-2 my-sm-0" action="{{ route('logout') }}" method="post">
                                @csrf
                                 <li class="nav-item active" style="padding-right:8px;">
                                    <button type="submit" class="btn btn1 btn-danger my-2 my-sm-0">
                                       <a class="btn btn1 btn-outline-danger my-2 my-lg-0 big"> {{ __('Logout') }} <i class="fa fa-sign-out" style="font-size:2.5rem" ></i></a>
                                    </button>
                                </li>
                                
                            </form>
                        </li>
                    @else
                        <li class="nav-item active" style="padding-right:8px;">
                            <a class="btn btn-light my-2 my-sm-0" href="{{ url('login') }}">Sign in</a>
                        </li>
                        <li class="nav-item active">
                            <a class="btn btn-light my-2 my-sm-0" href="{{url('register')}}">Sign up</a>
                        </li>
                    @endauth
                    
                </ul>
            </div>
        </nav>
        <main class="center" role="main">
           
                @isset($alertMessage)
                    @include('include.alert')
                @endisset
                
                @yield('content')
           
        </main>
        <footer class="container">
            <p>&copy; Congress</p>
        </footer>
        
        
    </body>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ url('assets/js/jquery-3.3.1.slim.min.js') }}"><\/script>')</script>
    <!-- PROBLEMA -->
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script><!-- PROBLEMA -->
    <!-- propio  ajax   pero calmero meteria un placeholder      en las paginas que quieres verlo lo cargas y los que no --> 
    <script src="{{ url('assets/js/mio.js') }}"></script>
    <script src="{{ url('assets/js/mio2.js') }}"></script>
    <!-- --> 
    <script src="{{ url('assets/js/main-form.js') }}"></script>
</html>