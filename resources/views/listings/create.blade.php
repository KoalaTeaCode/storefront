@extends('layouts.app')

@section('content')

  <div class="row">
    <h1> </h1>
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Create a Listing</h1></div>
            <div class="panel-body">
              {!! Form::open(array(
                'url' => '/listings',
                'class' => 'form',
                'method' => 'POST'
              )) !!}

                @include('listings.form')

                @include('errors.form-errors')

              {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@stop
