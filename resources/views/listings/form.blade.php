<div class="row">
  <div class="col-md-6">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="title">Title:</label>
      {!! Form::text('title', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="address">Address:</label>
      {!! Form::text('address', null, array('class' => 'form-control searchPlacesTextField')); !!}
    </div>

    <div class="form-group col-md-12">
      <label for="event_type_accommodations">What type of events can your space accommodate?</label>
      {{-- {!! Form::text('event_type_accommodations', null, array('class' => 'form-control')); !!} --}}
      @foreach(array('Retail Event', "Art Exhibit", "Food Event", "Business Event") as $filter)
      <div class="filter-wrap">
        <div class="filter-item">
          <label>
            <input type="checkbox" name=event_type_accommodations[] value="{{$filter}}" /><span>{{$filter}}</span>
          </label>
        </div>
      </div>
      @endforeach
    </div>

    <div class="form-group col-md-12">
      <label for="features">Space Type:</label>
      {{-- {!! Form::text('features', null, array('class' => 'form-control')); !!} --}}
      @foreach(array("Shared Space", "Boutique/Store", "Art Gallery", "Restaurant or Cafe", "Event Venue") as $filter)
      <div class="filter-wrap">
        <div class="filter-item">
          <label>
            <input type="checkbox" name=spaceType[] value="{{$filter}}" /><span>{{$filter}}</span>
          </label>
        </div>
      </div>
      @endforeach
    </div>

    <div class="form-group col-md-12">
      <label for="features">Features:</label>
      {{-- {!! Form::text('features', null, array('class' => 'form-control')); !!} --}}
      @foreach(array('Wifi', "Handicap Accessbile", "Parking", "Electricty") as $filter)
      <div class="filter-wrap">
        <div class="filter-item">
          <label>
            <input type="checkbox" name=features[] value="{{$filter}}" /><span>{{$filter}}</span>
          </label>
        </div>
      </div>
      @endforeach
    </div>

    <div class="form-group">
      <label for="size">Rental Space Size:</label>
      {!! Form::text('size', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="minium_lease_days">Minimum Lease Days:</label>
      {!! Form::text('minium_lease_days', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="maximum_lease_days">Maximum Lease Days:</label>
      {!! Form::text('maximum_lease_days', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="starting_daily_price">Starting Daily Price:</label>
      {!! Form::text('starting_daily_price', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="available_start_date">Start Date:</label>
      {!! Form::date('available_start_date', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="available_end_date">End Date:</label>
      {!! Form::date('available_end_date', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="description">Description:</label>
      {!! Form::textarea('description', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="private">Private:</label>
      {!! Form::select('private', array("no" => "No", "yes" => "Yes"), null, array('class' => 'form-control'))!!}
    </div>

    <hr>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
