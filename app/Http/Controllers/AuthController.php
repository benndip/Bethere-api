<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    protected $user;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->user = new User;
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:20', 'min:3'],
            'phone' => ['required', 'unique:users,phone'],
            'age' => ['required','integer'],
            'gender' => ['required'],
            'country' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'string', 'min:6']
        ]);

        $createdUser = $this->user::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'password' => Hash::make($request->password),
        ]);

        // If user is created, then log the user in
        if ($createdUser) {
            return $this->login($request);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'user registration failed, try again'
            ], 401);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'phone' => ['required'],
                'password' => ['required', 'string', 'min:6'],
            ]
        );

        $user = User::where('phone', $request->phone)->first();


        if ($user) {

            $jwt_token = null;

            $input = $request->only("phone", "password");

            if (!$jwt_token = auth()->attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => 'invalid phone or password'
                ], 422);
            }

            return response()->json([
                'success' => true,
                'token' => $jwt_token,
                'user' => $this->me()->original,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'invalid phone or password'
            ], 422);
        }
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

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
