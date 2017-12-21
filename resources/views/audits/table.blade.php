<table class="table table-responsive" id="audits-table">
    <thead>
    <tr>
        <th>Kode Obat</th>
        <th>Real Stock</th>
        <th>Data Stock</th>
        <th>Selisih</th>
        <th>Date</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($audits as $audit)
        <tr>
            @php
                $selisih = $audit->real_stock - $audit->data_stock;
            @endphp
            <td>{!! $audit->code !!}</td>
            <td>{!! $audit->real_stock !!}</td>
            <td>{!! $audit->data_stock !!}</td>
            <td>{!! $selisih == 0 ? "<span class='label label-success'>Match</span>" : ($selisih > 0 ? "<span class='label label-primary'>+$selisih</span>": "<span class='label label-danger'>$selisih</span>")!!}</td>
            <td>{!! $audit->created_at->format('d M Y') !!}</td>
            <td>
                {!! Form::open(['route' => ['audits.destroy', $audit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('audits.show', [$audit->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('audits.edit', [$audit->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>