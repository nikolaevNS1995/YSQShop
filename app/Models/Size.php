<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\SizeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'manufacturer_size',
        'russian_size',
        'bust_circumference',
        'waist_circumference',
        'hip_circumference'
    ];

    // Связь с товарами
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
