<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    public function allcoffee()
    {
        $coffees = Coffee::all();

        return response()->json($coffees);
    }
    
    public function addcoffee(Request $request)
    {
        $validatedData = $request->validate([
            'coffee'=> 'required',
            'description'=> 'required',
            'normal_price'=> 'required',
            'regular_price'=> 'required',
            'vip_price'=> 'required'

        ]);
        if ($validatedData) {
            return Coffee::create([
                'coffee'=> $request->coffee,
                'description'=> $request->description,
                'normal_price'=> $request->normal_price,
                'regular_price'=>$request->regular_price,
                'vip_price'=>$request->vip_price,
            ]);

        }else{
            return [
                'errors' => 'Field should be filled up'
            ];
        }
    }
    public function updatecoffee(Request $request, $id)
    {
        return Coffee::find($id)->update([
            'coffee'=> $request->coffee,
            'description'=> $request->description,
            'normal_price'=>$request->normal_price,
            'regular_price'=>$request->regular_price,
            'vip_price'=>$request->vip_price
        ]);
    }

    public function deletecoffee($id)
    {
        return Coffee::find($id)->delete();
    }

    public function showallcoffee()
    {
        return Coffee::all();
    }

    // public function addToCart($id)
    // {
    //     $product = Coffee::findOrFail($id);


    //     // $cart = session()->get('cart', []);

    //     // if(isset($cart[$id])) {
    //     //     $cart[$id]['quantity']++;
    //     // }  else {
    //     //     $cart[$id] = [
    //     //         "name" => $product->name,
    //     //         "image" => $product->image,
    //     //         "price" => $product->price,
    //     //         "quantity" => 1
    //     //     ];
    //     // }

    //     // session()->put('cart', $cart);
    //     // return redirect()->back()->with('success', 'Product add to cart successfully!');
    // }
}
