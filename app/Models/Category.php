<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title'];

    // Связь с карточками товаров
    public function productCards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductCard::class);
    }
}
