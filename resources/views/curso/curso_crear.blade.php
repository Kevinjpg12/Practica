@extends('layouts.app')

@section('content')

<form action="{{ route('alumnos.create') }}" method="POST"> 
{{-- ,$row->id --}}


    @csrf
    @method('POST')

    Descripcion:
    <input type="text" name="nombre" value="{{ $row->nombre }}">
    <br>
    Horario:
    <input type="text" name="apellidos" value="{{ $row->apellidos }}"> 
    <br>
    Valor:
    <input type="text" name="telefono" value="{{ $row->telefono }}"> 
    <br>
    Profesor:
    <input type="text" name="email" value="{{ $row->email }}"> 
    <br>
    <button type="submit">Grabar
    </button>
    
</form>

@endsection