<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'parent_id'];

    public function getProductCountAttribute(): int
    {
        return $this->productCards()->count();
    }

    // Связь с карточками товаров
    public function productCards(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductCard::class);
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
