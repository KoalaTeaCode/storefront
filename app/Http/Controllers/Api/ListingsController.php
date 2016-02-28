<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Listing;
use App\Review;
use App\Favorite;
use App\Reservation;
use Geocoder;

class ListingsController extends Controller
{

  protected $listings;

  public function __construct(Listing $listings)
  {
    $this->middleware('auth', ['except' => ['show', 'index']]);

    $this->listings = $listings;

    parent::__construct();
  }

  public function index(Request $request) {
    $listings = $this->listings;

    $address = $request->get('address');
    if (isset($address) && !empty($address)) {
      $distance = 1;
      try {
        $geocode = Geocoder::geocode($address);
        $latitude = $geocode->getLatitude();
        $longitude = $geocode->getLongitude();
      } catch (\Exception $e) {
        // No exception will be thrown here
        echo $e->getMessage();
      }

      $listings = Listing::distance($distance, $latitude . ", " . $longitude);
    }

    $eventType = $request->get('eventType');
    if (isset($eventType) && !empty($eventType)) {
      $listings = $listings->where('event_type_accommodations', '=', $eventType);
    }

    //@TODO: We need to add this to model, I believe.
    // $spaceType = $request->get('spaceType');
    // if (isset($spaceType) && !empty($spaceType)) {
    //   $listings = $listings->where('event_type_accommodations', '=', $spaceType)->get();
    // }

    $features = $request->get('features');
    if (isset($features) && !empty($features)) {
      $listings = $listings->where('features', '=', $features);
    }

    $listings = $listings->get();

    return $listings;
  }

}
