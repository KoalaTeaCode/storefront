<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Listing;
use App\Reservation;

class ReservationTest extends TestCase {

  use DatabaseTransactions;

  /**
   * @test
   * A basic functional test example.
   *
   * @return void
   */
  public function it_allows_user_to_reserve_listing() {

    $user = factory(User::class)->create();

    $listing = factory(Listing::class)->create();

    $startDate = new DateTime();
    $endDate = $startDate->add(new DateInterval('P10D'));

    $user->reserveListing($listing, $startDate, $endDate);

    $userReservation = $user->reservations()
      ->where('listing_id', '=', $listing->id)
      ->first();

    $listingReservation = $listing->reservations()
      ->where('listing_id', '=', $listing->id)
      ->first();

    $this->assertNotEmpty($userReservation);
    $this->assertNotEmpty($listingReservation);

    $this->assertEquals($startDate->format('Y-m-d'), $listingReservation->start_date);
    $this->assertEquals($endDate->format('Y-m-d'), $listingReservation->end_date);
    $this->assertEquals($listing->id, $listingReservation->listing_id);

    $this->assertEquals($startDate->format('Y-m-d'), $userReservation->start_date);
    $this->assertEquals($endDate->format('Y-m-d'), $userReservation->end_date);
    $this->assertEquals($listing->id, $userReservation->listing_id);
  }

  //@TODO: Cannot reseserve dates that are already reserved
  //@TODO: Cannot reserve twice
  //@TODO: Validate dates and that they are future

}

 ?>
