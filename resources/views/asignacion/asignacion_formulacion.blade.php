@extends('layouts.app')

@push('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@push('script')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
@endpush

@section('breadcrumb')
    <div class="content-header pb-0">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-book fa-fw"></i> Cursos</h1>
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
                            <h3 class="card-title"><strong>Asignacion [{{ $mode == 'new' ? 'NUEVO' : 'MODIFICANDO' }}]</strong>
                            </h3>
                        </div>
                    <div class="card-body">
                       
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-0">Alumno</label>
                                <select name="alumno_id" class="form-control select2-alumno" required>
                                    @if ($mode == 'edit')
                                        <option value="{{ $row->alumno_id }}" selected>
                                            {{ $row->alumno->apellidos . ' ' . $row->alumno->nombre }}</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label class="mb-0">Curso</label>
                                <select name="curso_id" class="form-control select2-curso2" required>
                                    @if ($mode == 'edit')
                                        <option value="{{ $row->curso_id }}" selected>
                                            {{ $row->curso->text}}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label class="mb-0">Periodo</label>
                                <input type="date" class="form-control" name="periodo" value="{{ old('periodo',$row->periodo) }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <a href="{{ route('cursos.index') }}" class="btn btn-outline-danger"><i
                                    class="fas fa-times fa-fw"></i>
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

@push('script')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2-alumno').select2({
                ajax: {
                    url: "{{ route('ajax_alumno') }}",
                    type: 'post',
                    dataType: 'json',
                    delay: 150,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    cache: true
                },
                placeholder: 'Selecciona una Alumno',
                allowClear: true,
                minimumInputLength: 0,
                theme: 'bootstrap4',
            });

            $('.select2-curso2').select2({
                ajax: {
                    url: "{{ route('ajax_curso2') }}",
                    type: 'post',
                    dataType: 'json',
                    delay: 150,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    cache: true
                },
                placeholder: 'Selecciona un Curso',
                allowClear: true,
                minimumInputLength: 0,
                theme: 'bootstrap4',
            });

        });
    </script>
@endpush
