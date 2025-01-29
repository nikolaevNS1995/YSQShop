<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    /** @use HasFactory<\Database\Factories\StatusFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['title'];

    // Связь с заказами
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}
