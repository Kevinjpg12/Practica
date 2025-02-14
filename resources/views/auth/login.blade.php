@extends('layouts.app')


@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authen</title>
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>

 <div id="contenedor">  
        <div id="contenedorcentrado"> 
            <div id="login">
                <form action="{{ route('login_submit') }}" method="POST">
                    @csrf
                    <label>Correo Electronico</label>
                    <input type="text" name="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <label>Contraseña</label>
                    <input type="text" name="password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <button type="submit">Login</button>
                </form>
            </div>

            <div id="derecho">
                <div class="titulo">
                        Bienvenido
                </div>
            </div>

        </div>

        
</div>
</body>
</html>

@endsection
