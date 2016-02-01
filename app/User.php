<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

use App\Review;

class User extends Authenticatable implements BillableContract
{
    use Billable;

    // protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function owns($object)
    {
      return $this->id == $object->user_id;
    }

    public function reserveListing($listing, $startDate, $endDate)
    {
      $reservation = new Reservation();
      $reservation->start_date = $startDate;
      $reservation->end_date = $endDate;
      $reservation->user_id = $this->id;
      $reservation->listing_id = $listing->id;
      $reservation->save();
    }

    /* Relations */
    public function reviews()
    {
      return $this->hasMany(Review::class, 'user_id');
    }

    public function reservations()
    {
      return $this->hasMany(Reservation::class, 'user_id');
    }
}
