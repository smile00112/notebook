<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Дашборд</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    
        <!-- Styles -->
        <link rel="stylesheet" href=" {{ asset('tmpl/css/style.default.css') }}" rel="stylesheet" >
        
    </head>
    <body>
        <div id="app">
            <main-app/>
            
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
