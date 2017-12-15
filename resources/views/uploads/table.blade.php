<table class="table table-responsive" id="uploads-table">
    <thead>
    <tr>
        <th>File</th>
        <th>Category</th>
        <th>Uploader</th>
        <th >Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($uploads as $upload)
        <tr>
            <td><a href="{{url("data/$upload->category/$upload->filename")}}">{!! $upload->filename !!}</a></td>
            <td>{!! $upload->category !!}</td>
            <td>{!! $upload->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['uploads.destroy', $upload->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if(!$upload->imported)
                    <a href="{!! route('uploads.show', [$upload->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    @endif
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>