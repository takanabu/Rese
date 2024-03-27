<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'shop_name',
        'region',
        'genre',
        'shop_overview',
        'image_url',
    ];
}