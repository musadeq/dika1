@extends('layouts.app')
@section('css')
    @include('layouts.datatables_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    @include('layouts.datatables_js')
    <script>
        $(document).ready(function () {
            $('#reviewTable').DataTable({
                "iDisplayLength": 50
            });
        });

        $(document).on('click', '#reupload', function (e) {
            e.preventDefault();
            var form = $(this).parents('form');
            return swal({
                    title: "Anda yakin?",
                    text: "File akan dihapus",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ya, hapus!",
                    closeOnConfirm: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        form.submit();
                    }
                });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Review</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('uploads.table_review')
                <div class="col-md-1 nopadding">
                    <div class="col-sm-6 nopadding">
                        {!! Form::open(['route' => ['uploads.import', $upload->id]]) !!}
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['uploads.destroy', $upload->id], 'method'=>'delete']) !!}
                        {!! Form::button('Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-md', 'id' => 'reupload']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

