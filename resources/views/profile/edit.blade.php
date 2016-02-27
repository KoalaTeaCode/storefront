@extends('layouts.app')

@section('content')
  <h1></h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit your profile</div>
            <div class="panel-body">
              {!! Form::model($user, array(
                'url' => "/profile",
                'class' => 'form',
                'method' => 'PUT'
              )) !!}

                @include('profile.form')

                @include('errors.form-errors')
                <input name="_method" type="hidden" value="PUT">
              {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>

@stop
