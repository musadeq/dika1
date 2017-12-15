<table class="table table-responsive" id="myTable">
    <thead>
    <tr>
        <th style="padding-left:0" class="text-left" width="5%">No</th>
        <th class="text-center">Code</th>
        <th class="text-center">Ref</th>
        <th class="text-center">Amount</th>
        <th class="text-center">Total</th>
        <th class="text-center">
            <div>Date</div>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchases as $purchase)
        <tr class="text-center">
            <td class="text-left">{!! $loop->iteration !!}</td>
            <td>{!! $purchase->code !!}</td>
            <td>{!! $purchase->ref !!}</td>
            <td>{!! $purchase->amount !!}</td>
            <td>{!! $purchase->total !!}</td>
            <td>{!! $purchase->created_at->format('d/m/Y') !!}</td>
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
    </tr>
    </tfoot>
</table>