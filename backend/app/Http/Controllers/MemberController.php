<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function show()
    {
        return Member::all();
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'fullName'=> 'required',
            'email'=>'required|email',
            'password' => 'required|min:3|max:25',
            // 'confirm_password' => 'required|same:password',
            'completeaddress' =>'required',
            'contactnumber' =>'required',
            'membership' => 'required'
        ]);
        if ($validatedData) {
            return Member::create([
                'fullName'=>$request->fullName,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
                'completeaddress' =>$request->completeaddress,
                'contactnumber' =>$request->contactnumber,
                'membership'=>$request->membership,
                $request->except('confirm_password')]);
        }else{
            return [
                'errors' => 'Field should be filled up'
            ];
        }
    }

    public function pick(Request $request)
    {

        return Member::where('email', $request)->first();
    }

    public function login(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$user = Member::where('email', $request->email)->first();

		if (! $user || ! Hash::check($request->password, $user->password)) {
			// throw ValidationException::withMessages([
			// 	'email' => ['The provided credentials are incorrect.'],
            //     'password'=>['The provided credentials are incorrect.'],
			// ]);
            return response()->json([
                'error'=>['The provided credentials are incorrect.']
            ],422);
		}

		return response()->json([
			'user' => $user,
			'access_token' => $user->createToken($request->email)->plainTextToken
		], 200);
	}

    public function update(Request $request, $id)
    {
        return Member::find($id)->update([
        'fullName'=>$request->full_name,
        'email'=> $request->email,
        'password'=> $request->password,
        'completeaddress' =>$request->complete_address,
        'contactnumber' =>$request->contact_number,
        'membership'=>$request->membership
        ]);
    }

    public function delete($id)
    {
        return Member::find($id)->delete();
    }
}
