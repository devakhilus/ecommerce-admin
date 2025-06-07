<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'discount', 'expires_at'];

    protected $dates = ['expires_at'];
    protected $casts = [
        'expires_at' => 'date',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
