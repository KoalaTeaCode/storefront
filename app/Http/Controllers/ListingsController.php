<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Listing;

class ListingsController extends Controller
{

  public function index(Request $request) {
    $listings = Listing::all();

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

    // $opportunity->user_id = $this->user->id;

    $listing->save();

    // flash()->success("Created", "Your oganization was created!");

    return redirect("/listings/$listing->id");
  }

}
