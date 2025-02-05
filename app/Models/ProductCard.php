<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCard extends Model
{
    /** @use HasFactory<\Database\Factories\ProductCardFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'sku',
        'weight',
        'height',
        'width',
        'length',
        'price'
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    // Связь с категорией
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Связь с товарами
    public function products(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
