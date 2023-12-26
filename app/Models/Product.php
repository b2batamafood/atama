<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
