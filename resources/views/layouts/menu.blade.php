<li class="{{ Request::is('purchases*') ? 'active' : '' }}">
    <a href="{!! route('purchases.index') !!}"><i class="fa fa-edit"></i><span>Purchases</span></a>
</li>

<li class="{{ Request::is('uploads*') ? 'active' : '' }}">
    <a href="{!! route('uploads.index') !!}"><i class="fa fa-edit"></i><span>Uploads</span></a>
</li>

<li class="{{ Request::is('sales*') ? 'active' : '' }}">
    <a href="{!! route('sales.index') !!}"><i class="fa fa-edit"></i><span>Sales</span></a>
</li>

