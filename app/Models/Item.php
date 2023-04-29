<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'company_id',
        'image',
        'stock',
    ];

/**
 * Get the company associated with the Item
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function company(): HasOne
{
    return $this->hasOne(Company::class, 'id', 'company_id');
}
}
