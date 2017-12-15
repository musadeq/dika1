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
        <th></th>
    </tr>
    </tfoot>
</table>