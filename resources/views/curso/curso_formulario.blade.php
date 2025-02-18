@extends('layouts.app')

@section('content')

<form action="{{ $url }}" method="POST">
    <input type="hidden" name="_method" value="{{ $mode == 'edit' ? 'PUT' : '' }}" />
    @csrf
    Descripcion:
    <input type="text" name="descripcion" value="{{ $row->descripcion }}">
    <br>
    Horario:
    <input type="text" name="horario" value="{{ $row->horario }}"> 
    <br>
    Valor:
    <input type="text" name="valor" value="{{ $row->valor }}"> 
    <br>
    Profesor:
    <input type="text" name="profesor" value="{{ $row->profesor }}"> 
    <br>
    <button type="submit">Grabar
    </button>
    
</form>
@endsection