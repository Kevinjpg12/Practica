@extends('layouts.app');

@section('content')
    Mostrando la lista de profesore
    <a href="{{ route('profesores.create') }}">Nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('profesores.edit',$item->id) }}">Editar
                        </a>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No hay registros</td>
                </tr>
            @endforelse
        <tbody>
    </table>
@endsection
