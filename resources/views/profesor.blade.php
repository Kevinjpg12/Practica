@extends('layouts.app') <!-- Asegúrate de extender tu layout admin -->

@section('dashboard-content')
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link href="{{ asset('/css/crud.css') }}" rel="stylesheet">
    
    <div id="Header" class="bg-success text-white text-center py-4">
        <h1>GESTIÓN DE PROFESORES</h1>
    </div>

</head>
<body>

<div id="Insertar" class="container mt-4">
        <h2 class="mb-3">INSERTAR PROFESOR</h2>
        <form action="index.php" method="POST">
            
                <label>NOMBRE</label>
                <input type="text" name="nombre" required>
            
                <label for="especie">APELLIDO</label>
                <input type="text" name="apellido" required>
           
                <label for="raza">CORREO</label>
                <input type="text" name="correo" required>
           
                <label for="edad">TELEFONO</label>
                <input type="text" name="telefono" required>
          
                <button type="submit" class="btn btn-success">Guardar</button>
        </form>
</div>

<div id="Listar" class="container mt-4">
    <h2>LISTAR PROFESORES</h2>
    <table class="table table-bordered">
        <thead class="bg-info text-white">
            <tr>
                <th>ID CLIENTE</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>CORREO</th>
                <th>TELEFONO</th>                          
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($clientes) && count($clientes) > 0) : ?>
            <?php foreach ($clientes as $cliente) : ?>
                <tr>
                    <td><?php echo $cliente['id_cliente']; ?></td>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['apellido']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                </tr>

            <?php endforeach; ?>

            <?php else : ?>
            <tr><td colspan="5">No hay datos para mostrar</td></tr>
            <?php endif; ?>
        </tbody>


    </table>
</div>

 <a href="{{ route('logout') }}"> SALIR </a>

</body>
</html>
@endsection 
