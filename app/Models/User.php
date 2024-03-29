<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'company',
        'email',
        'country',
        'state',
        'city',
        'zipcode',
        'address',
        'phone',
        'tax_id',
        'document',
        'password'
    ];

    protected $guarded = ['id', 'role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function carts(): HasMany {
        return $this->hasMany(Cart::class);
    }

    public function getTotalPriceAttribute() {
        return $this->carts()->join('products', 'carts.product_id', '=', 'products.id')
            ->sum(\DB::raw('products.price * carts.quantity'));
    }

    public function getTotalPriceWithTax($taxRate) {
        $totalPriceWithoutTax = $this->totalPrice;
        $taxAmount = $totalPriceWithoutTax * ($taxRate / 100);

        return $totalPriceWithoutTax + $taxAmount;
    }
}
