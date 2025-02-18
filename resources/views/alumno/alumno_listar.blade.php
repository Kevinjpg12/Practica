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
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>TELEFONO</th>
                <th>CORREO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($result as $item)
                <tr id="tr-{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellidos }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <a href="{{ route('alumnos.edit',$item->id) }}">Editar</a> | 
                        <a href="#" class="delete-record" data-id="{{ $item->id }}"
                                    data-url="{{ route('alumnos.destroy', $item->id) }}">
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
