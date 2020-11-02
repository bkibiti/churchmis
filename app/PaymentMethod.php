<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    Protected $table = 'payment_method';
    public $timestamps = false;
}
