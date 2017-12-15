<table class="table table-striped table-bordered" id="reviewTable">
<thead>
    <tr>
        <th>Kode Obat</th>
        <th>No Transaksi</th>
        <th>NIK</th>
        <th>Jumlah Obat</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    @foreach($excel as $row)
        <tr>
            <td>{!! $row->kode_obat!!}</td>
            <td>{!! $row->no_transaksi !!}</td>
            <td>{!! $row->nik !!}</td>
            <td>{!! $row->jumlah_obat !!}</td>
            <td>{!! $row->total_harga !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>