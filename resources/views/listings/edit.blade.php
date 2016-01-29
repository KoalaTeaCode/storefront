@extends('layouts.app')

@section('content')
  <h1></h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit your Listing</div>
            <div class="panel-body">
              {!! Form::model($listing, array(
                'url' => "/listings/$listing->id",
                'class' => 'form',
                'method' => 'PUT'
              )) !!}

                @include('listings.form')

                @include('errors.form-errors')
                <input name="_method" type="hidden" value="PUT">
              {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>

@stop
