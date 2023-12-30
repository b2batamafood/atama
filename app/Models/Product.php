<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model {
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'barcode',
        'price',
        'cost',
        'tax',
        'photo_url',
        /*
        'inventory',
        'unit_of_measurement',
        'location',
        'retail_price',
        */

        'category_id',
        'brand_id',
    ];

    public function scopeSearch($query, array $filters)
    {
        if ($filters['search'] ?? false) { // coalescing operator
            return $query->where('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('code', 'like', '%' . $filters['search'] . '%')
                ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('category_name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('brand_name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('barcode', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }
}
