@extends('layouts.app')

@section('content')

<form action="{{ route('alumnos.create') }}" method="POST"> 
{{-- ,$row->id --}}


    @csrf
    @method('POST')

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