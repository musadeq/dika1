<table class="table table-responsive" id="myTable">
    <thead>
    <tr>
        <th style="padding-left:0" class="text-left" width="5%">No</th>
        <th class="text-center">Code</th>
        <th class="text-center">Transaction Number</th>
        <th class="text-center">NIK</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Total</th>
        <th class="text-center">
            <div>Date</div>
        </th>
        <th class="text-center">Tipe</th>
        <th class="text-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr class="text-center">
            <td class="text-left">{!! $loop->iteration !!}</td>
            <td>{!! $sale->code !!}</td>
            <td>{!! $sale->transaction_number !!}</td>
            <td>{!! $sale->nik !!}</td>
            <td>{!! $sale->amount !!}</td>
            <td>{!! $sale->total !!}</td>
            <td>{!! $sale->created_at->format('d/m/Y') !!}</td>
            <td>{!! $sale->upload_id ? "Upload Excel" : "Manual Input"!!}</td>
            <td>
                @if($sale->upload_id)
                    {!! Form::open(['route' => ['uploads.destroy', $sale->upload_id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Semua data ".$sale->upload->filename." akan dihapus!')"]) !!}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Yakin ingin menghapus data?')"]) !!}
                    {!! Form::close() !!}
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th style="padding-left:0" class="text-left"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th></th>
    </tr>
    </tfoot>
</table>