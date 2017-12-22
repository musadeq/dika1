<!-- Real Stock Field -->
<div class="form-group col-sm-4">
    {!! Form::label('date', 'Date') !!}
    {!! Form::text('date', \Carbon\Carbon::now()->format('d-m-Y'), ['class' => 'form-control', "readonly"]) !!}
</div>

<div class="row"></div>

<div class="list">
    <div class="item">
        <!-- Code Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('code', 'Code:') !!}
            {!! Form::text('code[]', null, ['class' => 'form-control']) !!}
        </div>
        <!-- Real Stock Field -->
        <div class="form-group col-sm-6">
            {!! Form::label('real_stock', 'Real Stock:') !!}
            {!! Form::text('real_stock[]', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <div class="btn btn-default" onclick="newItem()">
        Add New Item
    </div>
    <div class="btn btn-default" onclick="deleteLastItem()">
        Delete Last Item
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('audits.index') !!}" class="btn btn-default">Cancel</a>
</div>

<script type="text/javascript">
    function newItem() {
        var a = $(".item")
        var b = $(".list")
        var c = a.last().clone().appendTo(b)
        c.find('input').val('');
    }

    function deleteLastItem() {
        var a = $(".list").children();
        if (a.length > 1)
            a.last().remove()
    }
</script>


