<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderBonus extends Model
{
    /** @use HasFactory<\Database\Factories\BonusFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'loyalty_program_id',
        'used_bonus_points'
    ];

    // Связь с заказом
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    // Связь с программой лояльности
    public function loyaltyProgram(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(LoyaltyProgram::class);
    }
}
