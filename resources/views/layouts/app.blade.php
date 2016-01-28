<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
          font-family: 'Lato';
          background: #efefef;
        }

        .fa-btn {
            margin-right: 6px;
        }

        .navbar {
          margin-bottom: 0px;
        }

        .banner {
          position: relative;
          height: 350px;
          padding-left: 0px;
        }

        .banner-title h2 {
          color: #FFF;
          font-weight: bold;
          font-size: 60px;
        }

        .banner-overlay {
          height: 100%;
          position: absolute;
          width: 100%;
          background: #444;
          opacity: 0.4;
        }

        .banner-image {
          position: absolute;
          top: 0;
          height: 350px;
          width: 100%;
        }

        .banner-small {
          height: 250px;
        }

        .banner-small .banner-image {
          height: 100%;
        }

        .hero-image {
          width: 100%;
          height: 100%;
        }

        .white-background {
          background-color: #fff;
        }

        .reservation-form {
          /*padding-top: 20px;*/
        }

        .details .desc {
          font-size: 18px;
          padding: 20px;
        }

        .details .desc div {
          padding: 20px 40px;
          border-bottom: 1px solid #eee;
        }

        .card {
          border: 1px solid #ddd;
          border-radius: 5px;
          transition: background-color 0.1s ease;
          margin-top: 20px;
          position: relative;
          margin: 10px auto;
          display: inline-block;
          vertical-align: top;
          height: 250px;
          width: 100%;
          background: #fff;
        }

        .card a.image-link {
          height: 150px;
          width: 100%;
          display: block;
          border-radius: 5px 5px 0px 0px;
          background-position: center;
        }

        .card .card-details {
          padding: 10px;
          font-size: 18px;
          padding-left: 25px;
        }

        .card .btn {
          width: 100%;
        }

        .btn-home {
          padding: 10px !important;
          background: teal;
          color: #fff !important;
        }

        .main-search {
          padding: 15px;
          border-radius: 5px;
          border: none;
          margin-bottom: 10px;
        }

        .main-search-btn {
          padding: 15px;
          width: 200px;
          font-size: 18px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/listings') }}">
                    New List Project
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/listings') }}">Listings</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                    <li style="padding: 5px;"><a class="btn btn-home" href="{{ url('/listings/create') }}">Create a Listing</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
