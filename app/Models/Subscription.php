<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'id',
        'user_id',
        'subtotal',
        'tax',
        'total',
        'payment_details',
        'valid_till',
        'status',
        'transaction_id',
        'currency'
    ];
}
