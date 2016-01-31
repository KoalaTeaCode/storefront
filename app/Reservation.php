<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
  public function cancel()
  {
    $this->cancelled = true;
    $this->save();
  }
}
