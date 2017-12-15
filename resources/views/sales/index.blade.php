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
                    $(api.column(0).footer()).html('Total :');
                    $(api.column(5).footer()).html('Rp.' + api.column(5, {page: 'current'}).data().sum());
                    $(api.column(4).footer()).html(api.column(4, {page: 'current'}).data().sum());
                }
            });
            yadcf.init(myTable, [
                {
                    column_number: 6,
                    filter_type: "range_date",
                    date_format: "dd/mm/yyyy",
                    filter_delay: 500
                }
            ]);
        });
    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Sales</h1>

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('sales.table')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

