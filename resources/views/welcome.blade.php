<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    
</head>
<body>

<div id="contenedor">
            
            <div id="contenedorcentrado">
                <div id="login">

                   <form action="{{ route('login') }}" method="GET">
                        <button type="submit" class="btn btn-secondary">LOGIN</button>
                    </form>
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="#">¿No tienes Cuenta? Registrate</a>
                        <hr>
                        <a href="#">« Volver</a>
                    </div>
                </div>
            </div>
</div>  
</body>
</html>

