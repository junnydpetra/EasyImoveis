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

        <link rel="stylesheet" href="{{asset('css/fotos.css')}}">

        <title>Easy Imóveis</title>
    </head>

    <body>

        <nav>
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{route('admin.imoveis.index')}}" class="brand-logo">EasyImóveis</a>
                    <ul class="right">
                        <li>
                            <a href="{{route('admin.imoveis.index')}}">Imóveis</a>
                        </li>
                        <li>
                            <a href="{{route('admin.cidades.index')}}">Cidades</a>
                        </li>
                    </ul>
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

        <script>
            @if (session('success'))
                M.toast({html: "{{session('success')}}"});
            @endif

            document.addEventListener('DOMContentLoaded', function(){
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems);
            });

        </script>

    </body>
</html>
