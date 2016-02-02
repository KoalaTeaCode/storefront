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

      <div class="col-md-12 col-xs-12 text-center">
        <button style="margin:10px;" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#moreFilters" aria-expanded="false" aria-controls="collapseExample">
          More Filters
        </button>
      </div>

      <div class='collapse' id="moreFilters">
        <form>

        <div class="col-md-12 col-xs-12 well" >
          <div class="col-md-2 filter-label">Event Type: </div>
          <div class="col-md-8">
            @foreach(array('Retail Event', "Art Exhibit", "Food Event", "Business Event") as $filter)
            <div class="filter-wrap">
              <div class="filter-item">
                {{$filter}}
                <span><input type="checkbox" name=eventType value="{{$filter}}" /></span>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-md-12 col-xs-12 well">
          <div class="col-md-2 filter-label">Space Types: </div>
          <div class="col-md-8">
            @foreach(array("Shared Space", "Boutique/Store", "Art Gallery", "Restaurant or Cafe", "Event Venue") as $filter)
            <div class="filter-wrap">
              <div class="filter-item">
                {{$filter}}
                <span><input type="checkbox" name='spaceType' value='{{$filter}}' /></span>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="col-md-12 col-xs-12 well">
          <div class="col-md-2 filter-label">Listing Features: </div>
          <div class="col-md-8">
            @foreach(array('Wifi', "Handicap Accessbile", "Parking", "Electricty") as $filter)
            <div class="filter-wrap">
              <div class="filter-item">
                {{$filter}}
                <span><input type="checkbox" name='features' value='{{$filter}}' /></span>
              </div>
            </div>
            @endforeach
          </div>
        </div>

          <input type='submit' value='submit' />
        </form>
      </div>
    </div>
  </div>
</nav>
<div class="show-filter-button btn btn-primary purple-inverse">Show Filters</div>
