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
            'number_of_people' => 'required|integer|min:1',
            'user_id' => 'required|integer',
            'shop_id' => 'required|integer',
            // 必要に応じて他のフィールドを追加します
        ]);

        // バリデーションが通ったら、新しい予約を作成します
        $reservation = new Reservation;
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->number_of_people = $validatedData['number_of_people'];
        $reservation->user_id = $validatedData['user_id'];
        $reservation->shop_id = $validatedData['shop_id'];
        // 必要に応じて他のフィールドを設定します

        $reservation->save(); // 予約をデータベースに保存します

        // 保存が成功したら、適切なレスポンスを返します
        return redirect('done');
    }

    public function success()
    {
        return view('reservation.done'); // 予約完了ページを表示
    }
}