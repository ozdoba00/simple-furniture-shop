<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $fillable = [
        'name',
        'code',
        'price',
        'promo_price',
        'promotion',
        'availability',
        'amount'
    ];
    
    use HasFactory;
}
