<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_card_id',
        'size_id',
        'color_id',
        'quantity',
        'views',
        'published'
    ];

    public function mainPhoto()
    {
        return $this->hasOne(Photo::class)->where('is_main', true);
    }

    // Связь с карточкой товара
    public function productCard(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCard::class);
    }

    // Связь с размерами
    public function size(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    // Связь с цветами
    public function color(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    // Связь с тегами (многие ко многим)
    public function tags(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    // Связь с фото
    public function photos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function promotions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Promotion::class, 'promotion_products');
    }
}
