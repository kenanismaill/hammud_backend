<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'is_tax_exempt',
        'status',
        'is_kitchen_item',
        'description',
    ];

    protected $casts = [
        'is_tax_exempt' => 'boolean',
        'status' => 'boolean',
        'is_kitchen_item' => 'boolean',
    ];
}
