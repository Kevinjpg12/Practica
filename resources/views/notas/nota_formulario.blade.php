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


@section('content')

<div class="col-md-12">
    <label class="mb-0">Alumno</label>
    <select name="alumno_id" class="form-control select2-alumno" required>
            
    </select>
</div>    

<div class="col-md-12">
    <label class="mb-0">Curso</label>
    <select name="curso_id" class="form-control select2-curso" required>

    </select> 
</div>


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

            $('.select2-curso').select2({
                ajax: {
                    url: "{{ route('ajax_curso') }}",
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

 