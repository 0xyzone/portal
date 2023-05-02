<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_address',
        'in_out',
        'phone',
        'alt_phone',
        'price',
        'discount',
        'delivery_charge',
        'advance',
        'due',
        'mode_of_payment',
        'payment_status',
        'order_status',
        'note'
    ];
}
