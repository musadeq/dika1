@extends('layouts.app')
@section('css')
    @include('layouts.datatables_css')
@endsection
@section('scripts')
    @include('layouts.datatables_js')
    <script>
        $(document).ready(function() {

            var myTable = $('#myTable').DataTable({
                footerCallback: function () {
                    var api = this.api();
                }
            });
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Stock</h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('stocks.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

