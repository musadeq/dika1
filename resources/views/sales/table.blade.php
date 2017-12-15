<table class="table table-responsive" id="sales-table">
    <thead>
    <tr>
        <th>Code</th>
        <th>Transaction Number</th>
        <th>NIK</th>
        <th>Amount</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $sale)
        <tr>
            <td>{!! $sale->code !!}</td>
            <td>{!! $sale->transaction_number !!}</td>
            <td>{!! $sale->nik !!}</td>
            <td>{!! $sale->amount !!}</td>
            <td>{!! $sale->total !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>