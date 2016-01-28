<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Listing;

class ListingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @test
     *
     * @return void
     */
    public function itShouldConvertAddressToCoordinates()
    {
      $address = '2711 Parkview Drive, Denton, Texas, 76210';
      $latLong = '33.136763, -97.056222';

      $listing = new Listing();
      $listing->setAddress($address);
      $listing->save();

      $listings = Listing::distance(1, $latLong);
      $listings = $listings->get();

      $this->assertEquals($address, $listings[0]->address);

      //Assert on the get by distance for now.
      // @TODO: We should have a coord accessor, I think.
      // $this->assertEquals($coords, $listing->coords);
    }

    /**
     * A basic test example.
     *
     * @test
     *
     * @return void
     */
    public function itShouldNotReturnAListingFarAwayFromDistance()
    {
      $latLong = '33.136763, -97.056222';
      $distance = 1;

      $listing = new Listing();
      $listing->save();

      $listings = Listing::distance($distance, $latLong);
      $listings = $listings->get();

      // @TODO: maybe check for does not contain instead.
      $this->assertEmpty($listings);
    }
}
