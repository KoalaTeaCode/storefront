<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Listing;
use App\Review;

class ReivewTest extends TestCase {

  use DatabaseTransactions;

  /**
   * @test
   * A basic functional test example.
   *
   * @return void
   */
  public function it_allows_user_to_review_listing() {

    $user = factory(User::class)->create();

    $listing = factory(Listing::class)->create();

    $score = 5;

    $review = new Review();
    //@TODO: Move this to constructor
    $review->item_reviewed_id = $listing->id;
    $review->item_reviewed_type = 'listing';
    $review->user_id = $user->id;
    $review->score = $score;
    $review->description = 'This was amazing';
    $review->save();

    $userReviews = $user->reviews()
      ->where('item_reviewed_id', '=', $listing->id)
      ->where('item_reviewed_type', '=', 'listing')
      ->get();

    $listingReview = $listing->reviews()
      ->where('id', '=', $review->id)
      ->first();

    $this->assertNotEmpty($userReviews);
    $this->assertNotEmpty($listingReview);
    $this->assertEquals($score, $listingReview->score);
    $this->assertEquals($user->id, $listingReview->user_id);
    $this->assertEquals($listing->id, $listingReview->item_reviewed_id);
    $this->assertEquals('listing', $listingReview->item_reviewed_type);
  }

}

 ?>
