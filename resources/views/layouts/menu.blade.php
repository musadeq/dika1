<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-cart-plus"></i><span>Laporan Pembelian</span></a>
</li>

<li class="{{ Request::is('sales*') ? 'active' : '' }}">
    <a href="{!! route('sales.index') !!}"><i class="fa fa-dollar"></i><span>Laporan Penjualan</span></a>
</li>

<li class="{{ Request::is('audits*') ? 'active' : '' }}">
    <a href="{!! route('audits.index') !!}"><i class="fa fa-search"></i><span>Audits</span></a>
</li>

<li class="{{ Request::is('uploads*') ? 'active' : '' }}">
    <a href="{!! route('uploads.index') !!}"><i class="fa fa-upload"></i><span>Uploads</span></a>
</li>

