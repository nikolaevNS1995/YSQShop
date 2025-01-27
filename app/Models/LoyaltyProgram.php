<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoyaltyProgram extends Model
{
    /** @use HasFactory<\Database\Factories\LoyaltyProgramFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'bonus_points'
    ];

    // Связь с пользователем
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Связь с бонусами в заказах
    public function orderBonuses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderBonus::class);
    }
}
