<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickbookCredential extends Model {
    protected $fillable = [
        'client_id',
        'client_secret',
        'redirect_url',
        'access_token',
        'refresh_token',
        'realm_id',
        'base_url',
        'api_url',
        'status',
        'updating_time',
    ];
}
