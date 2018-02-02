<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	@section('includes-css')
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="{{ URL::asset('css/principal.css') }}" rel="stylesheet" >
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	@show

	@section('includes-js')
		<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	@show
        
        @section('config-js')
            <script>
                CAMINHO_ROOT = '{{ url("") . "/" }}' ;
            </script>
	@show

</head>
<body>
    <div class="cabecalho">
        <div class="container">
            <h1>@yield('titulo')</h1>
            <h2 class="subtitulo">@yield('subtitulo')</h2>
        </div>
    </div>


    <div class="conteudo">
        <div class="container">
            @yield('conteudo')
        </div>
    </div>
</body>
</html>