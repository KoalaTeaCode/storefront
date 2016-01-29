<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Listing;

class ListingControllerTest extends TestCase
{
  use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function itPreventsAnoynymousUserFromCreatingAListing()
    {
        // $this->visit('/register')
        //  ->type('Taylor', 'name')
        //  ->check('terms')
        //  ->press('Register')
        //  ->seePageIs('/dashboard');
    }

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function itShouldConvertAddressToCoordinatesWhenUserCreatesListing()
    {
      $address = '2711 Parkview Drive, Denton, Texas, 76210';
      $latLong = '33.136763, -97.056222';

      $this->visit('/listings/create')
        ->type('New Listing', 'title')// @TODO: Randomly generate this name
        ->type($address, 'address')
        ->press('Submit');

      $listings = Listing::where('address', '=', $address)->get();

      $this->visit('/listings')
        ->see($listings[0]->title);

      $listings = Listing::distance(1, $latLong);
      $listings = $listings->get();

      $this->assertEquals($address, $listings[0]->address);
      // @TODO: Need a better way to assert coords
    }

    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function itFiltersByLocationWhenFilterIsProvided()
    {
      $addressLocationIsNotIn = 'Oklahoma City, OK, United States';
      $address = '2711 Parkview Drive, Denton, Texas, 76210';
      $latLong = '33.136763, -97.056222';

      $this->visit('/listings/create')
        ->type('New Listing', 'title')
        ->type($address, 'address')
        ->press('Submit');

      $listings = Listing::where('address', '=', $address)->get();
      // $this->assertCount(1, $listings);

      $this->visit('/listings')
        ->see($listings[0]->title);
      //@TODO: Should we click and check?

      $this->visit('/listings')
        ->type($addressLocationIsNotIn, 'address')
        ->press('Search')
        ->dontSee($listings[0]->title);
    }


    /**
     * A basic test example.
     *
     * @test
     * @return void
     */
    public function itPreventsNonOwnerFromEditing()
    {
      //Assuming we have a listing
      $listing = factory(Listing::class)->create();

      //A user who did not create, cannot view the edit page
      $user = factory(User::class)->create();

      $this->actingAs($user)
        ->visit("/listings/$listing->id/edit")
        ->see('Access Denied')
        ->seePageIs("/listings/$listing->id");

      //Or send a post request to the store route
    }
}
