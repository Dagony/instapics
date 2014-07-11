<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Instapics</title>
        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/bootstrap-theme.min.css') }}
        {{ HTML::script('js/jquery.js') }}
        {{ HTML::script('js/bootstrap.js') }}

        {{ HTML::style('css/main.css') }}
    </head>
    <body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="/">Instapics</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        @section('navigation')
                        <li class="active"><a href="/">Home</a></li>
                        @show
                    </ul>
                </div><!--/.nav-collapse -->
                @section('post_navigation')
                @if (Auth::check())
                @include('plugins.loggedin_postnav')
                @endif
                @show
            </div>
        </div>
    </div>





        <div class="container">
            @yield('content')
            <hr>
            <footer>
                <p>&copy; Instapics 2014</p>
            </footer>
        </div> <!-- /container -->
        @section('modals')
            @if (Auth::check())
                @include('plugins.upload_modal')
            @endif
        @show
    </body>
</html>