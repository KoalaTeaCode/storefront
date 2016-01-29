<style>
  .home-filters ul {
    list-style-type: none;
  }

  .home-filters .filter-wrap {
    width: 150px;
    float: left;
    text-align: center;
  }

  .home-filters .filter-item {
    background-color: #edefed;
    border: 1px solid #dce0e0;
    padding: 5px;
    margin: 5px 5px;
  }
</style>
<nav class="navbar navbar-default container-fluid home-filters">
  <div class="container-fluid">
    <div class=" col-md-12" id="bs-example-navbar-collapse-1">

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Location: </div>
        {{-- <input type="text" class="form-control col-md-2" name="miles" placeholder="Miles" style="width: 16.6666666667%;">  --}}
        <input type="text" class="searchPlacesTextField form-control col-md-8" name="city" placeholder="Type a city" style="width: 80%;" >
        {{-- <div class="col-md-4"><a href="#">Local</a></li>
        <li><a href="#">Virtual</a></li> --}}
      </div>

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Causes: </div>
        <div class="col-md-8">
          @foreach(array('Human Rights', "Animals", "Number 3", "Number 4") as $filter)
          <div class="filter-wrap">
            <div class="filter-item">
              {{$filter}}
              <span><input type="checkbox" /></span>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Sort: </div>
        <div class="col-md-8">
          @foreach(array('New', "Popular") as $filter)
          <div class="filter-wrap">
            <div class="filter-item">
              {{$filter}}
              <span><input type="checkbox" /></span>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      {{-- <form class="col-md-9" role="search">
        <div class="form-group col-md-10">

          <input type="text" class="form-control col-md-6" name="search" placeholder="Search" style="width:50%;">
        </div>
        <button type="submit" class="btn btn-default col-md-2">Submit</button>
      </form> --}}
    </div><!-- /.navbar-collapse -->
  </div>
</nav>
<div class="show-filter-button btn btn-primary purple-inverse">Show Filters</div>
