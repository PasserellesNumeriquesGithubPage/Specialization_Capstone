<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
			'fullName' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password',
            'completeaddress' => 'required|max:100',
            'contactnumber' => 'required|integer|max:13'
		]);

		$validatedData['password'] = Hash::make($validatedData['password']);

		if(Member::create($validatedData)) {
			return response()->json([
                "message" => "User registered."
            ], 201);
		}

		return response()->json([
            "message" => "Invalid Credentials."
        ], 404);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
		$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		$user = User::where('email', $request->email)->first();

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

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

}
