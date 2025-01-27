<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['product_id', 'image_path', 'is_main'];

    // Связь с товаром
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Получить главное фото для товара.
     *
     * @param int $productId
     * @return Photo|null
     */
    public static function getMainPhotoForProduct(int $productId): ?Photo
    {
        return self::where('product_id', $productId)
            ->where('is_main', true)
            ->first();
    }
}
