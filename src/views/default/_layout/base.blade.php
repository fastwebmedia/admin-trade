<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{{ $title }}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach (\FWM\Admin\AssetManager\AssetManager::styles() as $style)
    <link media="all" type="text/css" rel="stylesheet" href="{{ $style }}" >
    @endforeach

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    @foreach (\FWM\Admin\AssetManager\AssetManager::scripts() as $script)
    <script src="{{ $script }}"></script>
    @endforeach

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>

    </head>
    @yield('body', '<body class="skin-blue">')
        @yield('content')
    </body>
</html>