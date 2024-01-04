<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model {
    protected $fillable = [
        'order_id',
        'quantity',

        'code',
        'name',
        'description',
        'price',

        'category',
        'brand',
    ];

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
