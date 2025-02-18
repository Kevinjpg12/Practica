@extends('layouts.app');

@push('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@section('content')
    Mostrando la lista de alumnos
    <a href="{{ route('alumnos.create') }}">Nuevo</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Horario</th>
                <th>Valor</th>
                <th>Profesor</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($result as $item)
                <tr id="tr-{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->horario }}</td>
                    <td>{{ $item->valor }}</td>
                    <td>{{ $item->profesor }}</td>
                    <td>
                        <a href="{{ route('cursos.edit',$item->id) }}">Editar</a> | 
                        <a href="#" class="delete-record" data-id="{{ $item->id }}"
                                    data-url="{{ route('cursos.destroy', $item->id) }}">
                                    <i class="far fa-trash-alt"></i>
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
