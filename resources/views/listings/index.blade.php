@extends('layouts.app')

@section('content')

  <div class="container-fluid main-header banner banner-small">
    <div class="banner-image">
      <div class="banner-overlay"></div>
      <div class="hero-image" style="background-image: url('https://cdn.evbstatic.com/s3-build/perm_001/8218f5/django/images/home/banners/homepage_hero_banner_1.jpg');"></div>
    </div>
    <div class="col-md-4 col-md-offset-4 text-center banner-title">
      <h2>Listings</h2>
      <form>
        <input class="col-md-12 main-search searchPlacesTextField" name='address' placeholder="Search Cities and Neighborhoods">
        <input type='submit' value='Search' class="btn btn-primary major-callout white main-search-btn" />
      </form>
    </div>
  </div>

  @include('listings.filters')

  <div class="container cards">
    <div class="row">
      <div class="card-group">
        @foreach($listings as $listing)
          <div class="col-md-4">
            <div class="card">
              <a href="/listings/{{$listing->id}}" itemprop="url"
              class="image-link"
              style="background-image: url(http://d1q9ztij0byik7.cloudfront.net/filepicker/property/3858/PeAyX1NFT8q9vapo1WWa_160_OrchardST_NYC_Interior7F.png);"></a>
              <div class="card-details">
                <a href="/listings/{{$listing->id}}">
                  <strong class="name">{{$listing->title}}</strong>
                </a>
              </div>
              <div class="col-md-12">
                <a href="/listings/{{$listing->id}}">
                  <button class="btn btn-primary">
                    View
                  </button>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="col-md-12">

      </div>
    </div>
  </div>

@stop
