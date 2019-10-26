<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Investindo</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/stylesheet.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('css-view')
    </head>
    <body>
        @include('templates.menu_lateral')

        <section id="view-conteudo">
            @yield('conteudo-view')
        </section>
        
        @yield('js-view')
    </body>
</html>
