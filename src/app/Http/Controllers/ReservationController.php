<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // 予約モデルを使用します

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // バリデーションルールを定義します
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'number' => 'required|integer|min:1',
            // 必要に応じて他のフィールドを追加します
        ]);

        // バリデーションが通ったら、新しい予約を作成します
        $reservation = new Reservation;
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->number = $validatedData['number'];
        // 必要に応じて他のフィールドを設定します

        $reservation->save(); // 予約をデータベースに保存します

        // 保存が成功したら、適切なレスポンスを返します
        return redirect()->route('reservation.success');
    }
}