<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'number_of_people' => 'required|integer|min:1',
            'user_id' => 'required|integer',
            'shop_id' => 'required|integer',
        ]);

        $reservation = new Reservation;
        $reservation->date = $validatedData['date'];
        $reservation->time = $validatedData['time'];
        $reservation->number_of_people = $validatedData['number_of_people'];
        $reservation->user_id = $validatedData['user_id'];
        $reservation->shop_id = $validatedData['shop_id'];

        $reservation->save();

        return redirect('done');
    }

    public function success()
    {
        return view('reservation.done');
    }
}