@extends('layouts.app')

@section('content')

<form action="{{ route('alumnos.create') }}" method="POST"> 
{{-- ,$row->id --}}


    @csrf
    @method('POST')

    Nombre:
    <input type="text" name="descripcion" value="{{ $row->descripcion }}">
    <br>
    Apellido:
    <input type="text" name="horario" value="{{ $row->horario }}"> 
    <br>
    Telefono:
    <input type="text" name="valor" value="{{ $row->valor }}"> 
    <br>
    Correo:
    <input type="text" name="profesor" value="{{ $row->profesor }}"> 
    <br>
    <button type="submit">Grabar
    </button>
    
</form>

@endsection