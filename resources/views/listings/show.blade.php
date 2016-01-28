@extends('layouts.app')

@section('content')

  <div class="container-fluid banner">
    <div class="banner-overlay"></div>
    <div class="banner-image">
      <div class="hero-image" style="background-position: center;background-image: url('https://d1q9ztij0byik7.cloudfront.net/filepicker/property/3858/n0ZxCqQ5Wle8XRoMG4Cw_160_OrchardST_NYC_Interior7F.png');"></div>
    </div>
    <div class="col-md-4 col-md-offset-4 banner-title">
      {{-- <h2>{{$listing->title}}</h2> --}}
    </div>
  </div>

  <div class="container main-content">

    <div class="row details">
      <div class="col-md-8">
        <div class="white-background desc">
          <div style="border:none;">
            <h1>{{$listing->title}}</h1>
            {{$listing->address}}
          </div>

          <div>
            <h3>Description</h3>
            <p>{!! nl2br($listing->description) !!}</p>
          </div>

          <div>
            <strong>Space Type:</strong> {{$listing->type}}
          </div>

          <div>
            <strong>Event Type:</strong> {{$listing->event_type_accommodations}}
          </div>

          <div>
            <strong>Size:</strong> {{$listing->size}}
          </div>

          <div>
            <strong>Pricing:</strong>
          {{-- {{$listing->pricing}} --}}
          </div>

          <div>
            <strong>Minimal Rental:</strong> {{$listing->minium_lease_days}}
          </div>

          <div>
            <strong>Max Rental:</strong> {{$listing->maximum_lease_days}}
          </div>

          <div>
            <strong>Features:</strong> {{$listing->features}}
          </div>
        </div>
      </div>

      <div class="col-md-4 reservation-form" style="height:150px;">
        <div class="white-background" style="height:100%;padding:20px;">
            {!! Form::open(array(
              'url' => '/reservations',
              'class' => 'form',
              'method' => 'POST'
            )) !!}

            {{ csrf_field() }}
            <div class="form-group col-md-6">
              <label for="available_start_date">Start Date:</label>
              {!! Form::date('available_start_date', null, array('class' => 'form-control')); !!}
            </div>

            <div class="form-group col-md-6">
              <label for="available_end_date">End Date:</label>
              {!! Form::date('available_end_date', null, array('class' => 'form-control')); !!}
            </div>

            <div class="form-group col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Make Reservation</button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>

    </div>

</div>

{{-- <div class="container">
  <h2>Members</h2>
  @include('partials.members')
</div>

<div class="container">
  <h2>Related Opportunities</h2>
</div> --}}
{{-- @include('opportunities.list') --}}

{{-- @include('partials.chat') --}}

@stop

{{-- @section('scripts.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js" ></script>
  <script>
    // Dropzone.options.addPhotosForm = {
    //
    // }
  </script>
@stop --}}
