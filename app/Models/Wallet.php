<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'type', 'minimum_balance', 'monthly_interest_rate', 'balance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}