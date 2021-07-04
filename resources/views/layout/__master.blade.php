<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Blog</title>

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet"> --}}

        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
           
           
           <!-- Custom styles for this template  -->
         <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
       


        
</head>

<body>

    @include('layout.nav');

    <div class="container">
        @yield('content')
    </div>

</body>

</html>