@extends('layouts.app')

@section('content')
    Aqui estas en una seccion logueada

    <a href="{{ route('logout') }}"> SALIR </a>
@endsection