@extends('layouts.app')

@section('content')

  <div class="container-fluid banner">
    <div class="banner-overlay"></div>
    <div class="banner-image">
      <div class="hero-image" style="background-position: center;background-image: url('https://d1q9ztij0byik7.cloudfront.net/filepicker/property/3858/n0ZxCqQ5Wle8XRoMG4Cw_160_OrchardST_NYC_Interior7F.png');"></div>
    </div>
    <div class="col-md-4 col-md-offset-4 banner-title">
      {{-- <h2>{{$user->title}}</h2> --}}
    </div>
  </div>

  <div class="container main-content">
    <div class="row">
      <div class="col-md-8">
        <div class="white-background desc">
          <h1>{{$user->name}} <a href='/profile/edit'>Edit</a></h1>
          <strong>Email:</strong>{{$user->email}}<br>
          <strong>Phone:</strong>{{$user->phone}}<br>
          <strong>Company:</strong>{{$user->company}}<br>
          <strong>Company Type:</strong>{{$user->company_type}}<br>
          <strong>Company Description:</strong>{{$user->company_description}}<br>
          <strong>Website:</strong>{{$user->website}}<br>
          <strong>Location:</strong>{{$user->location}}<br>
          <h2>Linked Profiles</h2>
          <strong>Facebook:</strong>
          @if($user->facebook_token)
            Linked
          @else
            <a href="#">Link</a>
          @endif
          <br>
          <strong>Google:</strong>
          @if($user->google_token)
            Linked
          @else
            <a href="#">Link</a>
          @endif
          <br>
          <strong>Linkedin:</strong>
          @if($user->linkedin_token)
            Linked
          @else
            <a href="#">Link</a>
          @endif
          <br>
        </div>
      </div>
    </div>
  </div>

@stop
