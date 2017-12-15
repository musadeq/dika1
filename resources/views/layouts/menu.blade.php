<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-cart-plus"></i><span>Pembelian</span></a>
</li>

<li class="{{ Request::is('sales*') ? 'active' : '' }}">
    <a href="{!! route('sales.index') !!}"><i class="fa fa-dollar"></i><span>Penjualan</span></a>
</li>

<li class="{{ Request::is('uploads*') ? 'active' : '' }}">
    <a href="{!! route('uploads.index') !!}"><i class="fa fa-upload"></i><span>Uploads</span></a>
</li>
