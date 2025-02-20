@extends('layouts.app')

@section('breadcrumb')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-user-graduate fa-fw"></i> Alumnos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Maestro</li>
                        <li class="breadcrumb-item active">Alumnos</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <form action="{{ $url }}" method="POST">
        <input type="hidden" name="_method" value="{{ $mode == 'edit' ? 'PUT' : '' }}" />
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title"><strong>Registro [{{ $mode == 'new' ? 'NUEVO' : 'MODIFICANDO' }}]</strong>
                        </h3>
                    </div>
                    <div class="card-body border-bottom bg-form pb-1 pt-1">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="mb-0">Nombres</label>
                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre',$row->nombre) }}" required>
                            </div>
                            <div class="col-md-8">
                                <label class="mb-0">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="{{ old('apellidos',$row->apellidos) }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <label class="mb-0">Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="{{ $row->telefono }}">
                            </div>
                            <div class="col-md-9">
                                <label class="mb-0">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $row->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('alumnos.index') }}" class="btn btn-outline-danger"><i class="fas fa-times fa-fw"></i>
                                CANCELAR</a>
                            <button type="submit" class="btn btn-outline-success ml-1"><i class="fas fa-save fa-fw"></i>
                                {{ $mode == 'new' ? 'CREAR' : 'MODIFICAR' }} </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection
