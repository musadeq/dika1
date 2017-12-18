<!-- Real Stock Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-4">
        {!! Form::label('date', 'Date') !!}
        {!! Form::text('date', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code[]', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('real_stock', 'Real Stock:') !!}
    {!! Form::text('real_stock[]', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('code', 'Code:') !!}
    {!! Form::text('code[]', null, ['class' => 'form-control']) !!}
</div>

<!-- Real Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('real_stock', 'Real Stock:') !!}
    {!! Form::text('real_stock[]', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('audits.index') !!}" class="btn btn-default">Cancel</a>
</div>
