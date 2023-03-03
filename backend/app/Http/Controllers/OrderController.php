<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\Order;
use App\Models\Member;
use App\Models\Cart;

class OrderController extends Controller
{
    public function checkOut(Request $request)
    {
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken);
        $user = $token->tokenable;
        $user_id = Member::find($user)->value('id');
        $total = Cart::where('member_id', $user_id)->pluck('total')->sum();

        return Order::create([
            'member_id'=>$user_id,
            'total'=>$total,
        ]);
    }

    public function removeOrders(Request $request) {
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken);
        $user = $token->tokenable;
        $user_id = Member::find($user)->value('id');

        return Cart::where('member_id',$user_id)->delete();
    }
}
