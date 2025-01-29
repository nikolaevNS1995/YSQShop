<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    /** @use HasFactory<\Database\Factories\PromoCodeFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'description',
        'discount_value',
        'discount_unit',
        'start_date',
        'end_date',
        'usage_limit',
        'times_used'
    ];

    // Связь с заказами
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Проверка на доступность промокода
    public function isAvailable()
    {
        return ($this->usage_limit === null || $this->times_used < $this->usage_limit) &&
            (is_null($this->start_date) || now()->greaterThanOrEqualTo($this->start_date)) &&
            (is_null($this->end_date) || now()->lessThanOrEqualTo($this->end_date));
    }
}
