<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'root_id',
        'name',
        'symbol'
    ];

    public $timestamps = false;

    public const ROOT = 1;
}
