<div class="row">
  <div class="col-md-6">
    {{ csrf_field() }}

    <div class="form-group">
      <label for="email">Email:</label>
      {!! Form::email('email', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="phone">Phone:</label>
      {!! Form::text('phone', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="company">Company:</label>
      {!! Form::text('company', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="company_type">Company Type:</label>
      {!! Form::select('company_type', array("no" => "No", "yes" => "Yes"), null, array('class' => 'form-control'))!!}
    </div>

    <div class="form-group">
      <label for="company_description">Company Description:</label>
      {!! Form::textarea('company_description', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="website">Website:</label>
      {!! Form::text('website', null, array('class' => 'form-control')); !!}
    </div>

    <div class="form-group">
      <label for="location">Location:</label>
      {!! Form::text('location', null, array('class' => 'form-control searchPlacesTextField')); !!}
    </div>

    <hr>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</div>
