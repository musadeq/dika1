@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Upload
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="col-sm-6 nopadding">
            <div class="box box-primary">

                <div class="box-body ">
                    <div class="row">
                        {!! Form::open(['route' => 'uploads.store', 'files' => true]) !!}

                        @include('uploads.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
