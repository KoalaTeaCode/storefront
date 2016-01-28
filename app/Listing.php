<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Geocoder;
use DB;

class Listing extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'address',
    'type',
    'event_type_accommodations',
    'features',
    'size',
    'minium_lease_days',
    'maximum_lease_days',
    'starting_daily_price',
    'available_start_date',
    'available_end_date',
    'privacy',
    'description',
  ];

  // @TODO: Change to mutator
  public function setAddress($address) {
    $this->address = $address;

    try {
      $geocode = Geocoder::geocode($address);
      // The GoogleMapsProvider will return a result
      // var_dump($geocode);
      $latitude = $geocode->getLatitude();
      $longitude = $geocode->getLongitude();
      $this->coords = DB::raw("GeomFromText('POINT($latitude $longitude)')");
    } catch (\Exception $e) {
      // No exception will be thrown here
      echo $e->getMessage();
    }
  }

  public function scopeDistance($query, $dist, $location)
  {
      return $query->whereRaw("st_distance(coords, POINT($location)) < $dist");
  }

  public function getCoordsAttribute($value){
    return DB::raw("SELECT ST_AsText(coords) FROM listings where id = '$this->id'");
  }

}
