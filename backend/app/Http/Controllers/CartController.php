<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use App\Models\Cart;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class CartController extends Controller
{
    public function myCart(Request $request)
    {

        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken);
        $user = $token->tokenable;

        $user_id = Member::find($user)->value('id');

        // return Members::find($user_id)->carts;


        return Cart::where('member_id',$user_id)->get();
    }

    public function deleteCoffee($id)
    {
        // return Coffee::find(Auth::id())->()->detach($id);
    }

    // public function addCoffee($id)
    // {
    //     $data = Coffee::find(Auth::id())->books()->attach($id);

    //     return response()->json([
    //         'data' => $data,
    //         'message' => "Coffee added to cart successfully!"
    //     ]);
    // }

    public function addToCart(Request $request, $id)
    {
        $coffee = Coffee::where('id', $id)->value('coffee');
        $price = Coffee::where('id', $id)->value('normal_price');
        $quantity = 1;
        $total = $price * $quantity;
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken);
        $user = $token->tokenable;
        $user_id = Member::find($user)->value('id');
        Member::find($user_id)->carts()->attach($id);

        // return response()->json($user_id);


        return Cart::create([
            'member_id'=>$user_id,
            'coffee' => $coffee,
            'price' =>$price,
            'qty'=>$quantity,
            'total'=>$total,
        ]);
    }

    public function subTotal(Request $request)
    {
        $hashedToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($hashedToken);
        $user = $token->tokenable;
        $user_id = Member::find($user)->value('id');
        $total = Cart::where('member_id', $user_id)->pluck('total');

        return $total->sum();
        // return response()->json($total);
    }

    public function allCarts()
    {
        $coffees = Cart::all();

        return response()->json($coffees);
    }
}
