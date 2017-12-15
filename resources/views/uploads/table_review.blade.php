<table class="table table-striped table-bordered" id="reviewTable">
<thead>
    <tr>
        <th>Kode Obat</th>
        <th>Ref Number</th>
        <th>Jumlah Obat</th>
        <th>Total Biaya</th>
    </tr>
    </thead>
    <tbody>
    @foreach($excel as $row)
        <tr>
            <td>{!! $row->kode_obat!!}</td>
            <td>{!! $row->ref_number !!}</td>
            <td>{!! $row->jumlah_obat !!}</td>
            <td>{!! $row->total_biaya !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>