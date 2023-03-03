<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function book(Request $request){
        return Book::create([
            'full_name'=>$request->full_name,
            'member_id' =>$request->member_id,
            'email'=> $request->email,
            'phone_number' => $request->phone_number,
            'address' =>$request->address,
            'reservation_date_time' =>$request->reservation_date_time,
            'order_notes'=>$request->order_notes
            ]);
}
}
