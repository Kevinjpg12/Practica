@extends('layouts.app')

@section('content')
    <a href="{{ route('asignacion.create') }}">Nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Alumno</th>
                <th>Profesor</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>                    
                    <td>{{ $item->alumno->apellido . ' ' .$item->alumno->nombre }}</td>
                    <td>{{ $item->profesor->apellido . ' ' .$item->profesor->nombre }}</td>
                    <td>{{ $item->curso->descripcion }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10">No hay registros</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection