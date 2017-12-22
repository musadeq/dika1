<table class="table table-responsive" id="myTable">
    <thead>
    <tr>
        <th style="padding-left:0" class="text-left" width="5%">No</th>
        <th class="text-center">Code</th>
        <th class="text-center">Amount</th>
        <th class="text-center">
            <div>Last Update</div>
        </th>
    </tr>
    </thead>
    <tbody>
    @foreach($stocks as $stock)
        <tr class="text-center">
            <td class="text-left">{!! $loop->iteration !!}</td>
            <td>{!! $stock->code !!}</td>
            <td>{!! $stock->amount !!}</td>
            <td>{!! $stock->updated_at->format('d/m/Y') !!}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th style="padding-left:0" class="text-left"></th>
        <th class="text-center"></th>
        <th class="text-center"></th>
        <th></th>
    </tr>
    </tfoot>
</table>