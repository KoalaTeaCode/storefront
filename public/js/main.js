var defaultBounds = new google.maps.LatLngBounds(
  new google.maps.LatLng(-33.8902, 151.1759),
  new google.maps.LatLng(-33.8474, 151.2631));

var input = document.querySelector('.searchPlacesTextField');
var options = {
  // bounds: defaultBounds,
  // types: ['city']
};

if (input) {
  autocomplete = new google.maps.places.Autocomplete(input, options);
}


// @TODO Change this to directive
var w = window.innerWidth
|| document.documentElement.clientWidth
|| document.body.clientWidth;

var h = window.innerHeight
|| document.documentElement.clientHeight
|| document.body.clientHeight;



var filtersShown = false;
var showFilterButton = document.querySelector('.show-filter-button');
var filters = document.querySelector('.home-filters');

if (w < 765) {
  // toggleFilters()
  showFilterButton.style.display = "block";
  filters.style.display = 'none';
  showFilterButton.addEventListener('click', toggleFilters, false);
}

function toggleFilters() {

  if (!filtersShown) {
    filtersShown = true;
    filters.classList.add('mobile-filters');
    filters.style.display = 'block';
  } else {
    filtersShown = false;
    filters.classList.remove('mobile-filters');
    filters.style.display = 'none';
  }

}
