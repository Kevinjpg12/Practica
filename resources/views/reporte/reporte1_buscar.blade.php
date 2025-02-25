@extends('layouts.app')

@section('content')
    <form action="{{ route('reporte1_buscar_submit') }}" method="POST">
        @csrf
        <input name="periodo">
        <button type="submit"> Generar
        </button>
</form>
@endsection