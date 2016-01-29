@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading"><h1>Review</h1></div>
            <div class="panel-body">
              {!! Form::open(array(
                'url' => "/listings/$listing->id/review",
                'class' => 'form',
                'method' => 'POST'
              )) !!}

              {{ csrf_field() }}

              <div class="form-group">
                <label for="score">Score:</label>
                {!! Form::text('score', null, array('class' => 'form-control')); !!}
              </div>

              <div class="form-group">
                <label for="description">Description:</label>
                {!! Form::textarea('description', null, array('class' => 'form-control')); !!}
              </div>

              @include('errors.form-errors')

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

              {!! Form::close() !!}
            </div>
        </div>
    </div>
  </div>
@stop
