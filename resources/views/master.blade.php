<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/dashboard.css">

    @section('css')
    @show
  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
      <!-- Alerts/ Messages -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Property Management System</a>
        </div>

        <!-- Navigation top bar -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown">{{ Auth::user()->full_name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
              </ul>
            </li>
          </ul>
            <!-- Supports nagivation for small devices -->
            <ul class="nav navbar-nav navbar-left hidden-lg hidden-md hidden-sm">
              @yield('navigation')
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
      <!-- Nagivation side bar -->
      <div class="col-sm-3 col-md-2 sidebar">
        <ul class="nav nav-sidebar">
          @yield('navigation')
        </ul>
      </div>
    </div>
      <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      @if(Session::has('message'))
        <div class="alert alert-warning">
          {{ Sesson::get('message') }}
        </div>
      @endif
      @yield('content')
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/scripts/bootstrap.min.js"></script>
    <!-- Location for extra scripts -->
    @section('scripts')
    @show
  </body>
</html>
