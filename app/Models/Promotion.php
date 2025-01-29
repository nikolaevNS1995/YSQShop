<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    /** @use HasFactory<\Database\Factories\PromotionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'discount_value',
        'discount_unit',
        'start_date',
        'end_date'
    ];

    // Связь с товарами
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'promotion_products');
    }

    // Проверка доступности акции
    public function isActive(): bool
    {
        return (is_null($this->start_date) || now()->greaterThanOrEqualTo($this->start_date)) &&
            (is_null($this->end_date) || now()->lessThanOrEqualTo($this->end_date));
    }
}
