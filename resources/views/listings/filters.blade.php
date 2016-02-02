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

      <div class='well col-md-12'>
        <div class="col-md-6 col-xs-12">
          <div class="col-md-2 filter-label">Daily Price: </div>
          <input class='' type="range" name="points" min="0" max="10">
        </div>

        <div class="col-md-6 col-xs-12">
          <div class="col-md-2 filter-label">Space Size: </div>
          <input class='' type="range" name="points" min="0" max="10">
        </div>
      </div>

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Event Type: </div>
        <div class="col-md-8">
          <form>
          @foreach(array('Retail Event', "Art Exhibit", "Food Event", "Business Event") as $filter)
          <div class="filter-wrap">
            <div class="filter-item">
              {{$filter}}
              <span><input name=eventType type="checkbox" value="{{$filter}}" /></span>
            </div>
          </div>
          @endforeach
            <input type='submit' value='submit' />
          </form>
        </div>
      </div>

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Space Types: </div>
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

      <div class="col-md-12 col-xs-12 well">
        <div class="col-md-2 filter-label">Listing Features: </div>
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

    </div><!-- /.navbar-collapse -->
  </div>
</nav>
<div class="show-filter-button btn btn-primary purple-inverse">Show Filters</div>
