<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model {

    protected $fillable = [
        'user_id',
        'status',
        'tax',
        'subtotal',
        'total', //['active','complete','cancel']

        'name',
        'company',
        'email',
        'phone',

        'country',
        'state',
        'city',
        'address',
        'zipcode',

        'card_holder',
        'card_no',
        'card_exp',
        'card_cvc',
    ];

    public function order_details(): HasMany {
        return $this->hasMany(OrderDetail::class);
    }

}
