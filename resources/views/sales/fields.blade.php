<!-- Code Field -->
<div class="form-group col-sm-3">
    {!! Form::label('code', 'Code:') !!}
    <select class="form-control select2" name="classification">
        @if (@$purchase)
            <option selected>{!! $purchase->code !!}</option>
        @endif
    </select>
</div>

<div class="row"></div>

<!-- Transaction Number Field -->
<div class="form-group col-sm-3">
    {!! Form::label('transaction_number', 'Transaction Number:') !!}
    {!! Form::text('transaction_number', null, ['class' => 'form-control']) !!}
</div>

<div class="row"></div>

<!-- Amount Field -->
<div class="form-group col-sm-3">
    {!! Form::label('amount', 'Amount:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<div class="row"></div>

<!-- Total Field -->
<div class="form-group col-sm-3">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control']) !!}
</div>

<div class="row"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sales.index') !!}" class="btn btn-default">Cancel</a>
</div>

@push('scripts')
<script type="text/javascript">
    $(function() {
        console.log( "ready!" );
    });
        $(".select2").select2({
            tags: true,
            ajax: {
                url: "{!! route('sales.code.all') !!}",
                dataType: 'json',
                processResults: function (data) {
                    // Tranforms the top-level key of the response object from 'items' to 'results'
                    var test = 1;
                    ndata = data.map(function(a){
                        return {
                            id: test++,
                            text:a
                        }
                    });
                    return {
                        results: ndata
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        })
</script>
@endpush