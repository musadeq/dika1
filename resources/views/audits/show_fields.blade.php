<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $audit->id !!}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', 'Code:') !!}
    <p>{!! $audit->code !!}</p>
</div>

<!-- Real Stock Field -->
<div class="form-group">
    {!! Form::label('real_stock', 'Real Stock:') !!}
    <p>{!! $audit->real_stock !!}</p>
</div>

<!-- Data Stock Field -->
<div class="form-group">
    {!! Form::label('data_stock', 'Data Stock:') !!}
    <p>{!! $audit->data_stock !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $audit->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $audit->updated_at !!}</p>
</div>

