@extends('layouts.app')

@section('content')

<form action="{{ $url }}" method="POST">
    <input type="hidden" name="_method" value="{{ $mode == 'edit' ? 'PUT' : '' }}" />
    @csrf
    Nombre:
    <input type="text" name="nombre" value="{{ $row->nombre }}">
    <br>
    Apellido:
    <input type="text" name="apellidos" value="{{ $row->apellidos }}"> 
    <br>
    Telefono:
    <input type="text" name="telefono" value="{{ $row->telefono }}"> 
    <br>
    Correo:
    <input type="text" name="email" value="{{ $row->email }}"> 
    <br>
    <button type="submit">Grabar
    </button>
    
</form>
@endsection