<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-cart-plus"></i><span>Laporan Obat Masuk</span></a>
</li>

<li class="{{ Request::is('sales*') && !Request::is('sales/create')  ? 'active' : '' }}">
    <a href="{!! route('sales.index') !!}"><i class="fa fa-dollar"></i><span>Laporan Obat Keluar</span></a>
</li>

<li class="{{ Request::is('sales/create') ? 'active' : '' }}">
    <a href="{!! route('sales.create') !!}"><i class="fa fa-dollar"></i><span>Input Obat Keluar</span></a>
</li>

<li class="{{ Request::is('audits*') ? 'active' : '' }}">
    <a href="{!! route('audits.index') !!}"><i class="fa fa-search"></i><span>Audits</span></a>
</li>

<li class="{{ Request::is('uploads*') ? 'active' : '' }}">
    <a href="{!! route('uploads.index') !!}"><i class="fa fa-upload"></i><span>Uploads</span></a>
</li>

<li class="{{ Request::is('stock*') ? 'active' : '' }}">
    <a href="{!! route('stock.index') !!}"><i class="fa fa-upload"></i><span>Stock</span></a>
</li>

