<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    /** @use HasFactory<\Database\Factories\ProductTagFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'tag_id'];

    // Связь с товаром
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    // Связь с тегом
    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
