<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');

    parent::__construct();
  }

  public function show() {
    $user = $this->user;//@TODO: Do we need this?
    return view('profile.show', compact('user'));
  }

  public function edit() {
    $user = $this->user;//@TODO: Do we need this?
    return view('profile.edit', compact('user'));
  }

  public function update(Request $request) {
    $user = $this->user;//@TODO: Do we need this?

    $user->phone  = $request->get('phone');
    $user->company    = $request->get('company');
    $user->company_type  = $request->get('company_type');
    $user->company_description    = $request->get('company_description');
    $user->website  = $request->get('website');
    $user->location    = $request->get('location');
    $user->save();

    // flash()->success("Updated", "Your profile was updated!");
    return redirect("/profile");
  }

}
