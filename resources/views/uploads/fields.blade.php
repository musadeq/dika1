<div class="form-group col-sm-12">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category', ['pembelian' => 'Pembelian', 'penjualan' => 'Penjualan'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('upload', 'upload excel pembelian:') !!}
    {!! Form::file('file', ['class' => 'form-control', 'accept'=>".xls,.xlsx"]) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('purchases.index') !!}" class="btn btn-default">Cancel</a>
</div>
