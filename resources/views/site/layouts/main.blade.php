<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <title>Easy Imóveis</title>
    </head>

    <body>

        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{route('admin.imoveis.index')}}" class="brand-logo center">EasyImóveis</a>
                </div>
            </div>
        </nav>

        <div class="container">
            @yield('main_content')
        </div>

        <div>
            @yield('secondary_content')
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    </body>
</html>
