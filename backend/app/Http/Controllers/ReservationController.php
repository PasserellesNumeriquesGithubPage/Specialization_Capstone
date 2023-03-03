<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation;

class ReservationController extends Controller
{
    public function addReservation(Request $request){
            return Reservation::create([
                'fullName'=>$request->full_name,
                'member_id' =>$request->member_id,
                'email'=> $request->email,
                'phone_number' => $request->phone_number,
                'address' =>$request->address,
                'reservation_date_time' =>$request->reservation_date_time,
                'order_note'=>$request->order_note]
            );
    }
}
