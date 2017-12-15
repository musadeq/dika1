@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Upload
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($upload, ['route' => ['uploads.update', $upload->id], 'method' => 'patch']) !!}

                        @include('uploads.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection