<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // 予約に関連するテーブル名を指定します
    protected $table = 'reservations';

    // モデルのJSON形式のデータに含める属性
    protected $fillable = [
        'date',
        'time',
        'number',
        // 必要に応じて他のフィールドを追加します
    ];

    // この予約がどのユーザーに属しているかを定義します
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // この予約がどのショップに属しているかを定義します
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}