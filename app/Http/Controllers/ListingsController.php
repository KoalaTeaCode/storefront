<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Listing;
use Geocoder;

class ListingsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth', ['except' => ['show', 'index']]);

    parent::__construct();
  }

  public function index(Request $request) {
    $listings = Listing::all();

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
      $listings = $listings->get();
    }

    return view('listings.index', compact('listings'));
  }

  public function show($listingId) {
    $listing = Listing::find($listingId);

    return view('listings.show', compact('listing'));
  }

  public function create() {
    return view('listings.create');
  }

  public function store(Request $request) {
    $listing = new Listing($request->all());

    $listing->user_id = $this->user->id;

    //@TODO: Make sure address is required
    $listing->setAddress($request->get('address'));

    $listing->save();

    // flash()->success("Created", "Your oganization was created!");

    return redirect("/listings/$listing->id");
  }

  public function edit($listingId) {

    $listing = Listing::find($listingId);

    if (!$this->user->owns($listing)) {
      return "Access Denied";
    }

    return view('listings.edit', compact('listing'));
  }

  public function update(Request $request, $id) {
    $listing = Listing::find($id);

    if (!$this->user->owns($listing)) {
      // flash()->error("Access Denied", "You must have permission to edit this org!");
      return redirect("/listings/$listing->id");
    }

    //@TODO: Easy way to add more fields?
    // @TODO: Update coords
    $listing->title         = $request->get('title');
    $listing->address  = $request->get('address');
    $listing->save();

    // flash()->success("Updated", "Your oganization was updated!");

    return redirect("/listings/$listing->id");
  }

}
