<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FavoriteProduct extends Model
{
    /** @use HasFactory<\Database\Factories\FavoriteProductFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['favorite_id', 'product_id', 'quantity'];

    // Связь с избранным
    public function favorite(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Favorite::class);
    }

    // Связь с товаром
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
