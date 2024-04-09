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

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function scopeFavoritedByUser($query, $userId) {
        return $query->whereHas('favorites', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        });
    }
}