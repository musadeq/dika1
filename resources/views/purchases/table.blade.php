<table class="table table-responsive" id="purchases-table">
    <thead>
    <tr>
        <th>Code</th>
        <th>Ref</th>
        <th>Amount</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchases as $purchase)
        <tr>
            <td>{!! $purchase->code !!}</td>
            <td>{!! $purchase->ref !!}</td>
            <td>{!! $purchase->amount !!}</td>
            <td>{!! $purchase->total !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>