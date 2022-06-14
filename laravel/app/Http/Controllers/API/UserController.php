<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                    return response()->json(['user_not_found'], 404);
            }
            } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
                    return response()->json(['token_expired'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                    return response()->json(['token_invalid'], $e->getStatusCode());
            } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
                    return response()->json(['token_absent'], $e->getStatusCode());
            }
            return response()->json(compact('user'));
    }

    public function register(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function getUser(Request $request) {
        $users = DB::table('users');

        if(request('id') !== null) {
            $users = $users->where('id',request('id'));
        }

        if(request('username') !== null) {
            $users = $users->where('username', request('username'));
        }

        if(request('email') !== null) {
            $users = $users->where('email', request('email'));
        }

        if(request('like') !== null) {
            $username = request('like');
            $users = $users->where('username','like',"%{$username}%");
        }

        return response()->json($users->get(), 200);
    }

    public function getUserFriends( Request $request ) {
        $user = User::findOrFail($request->user);

        return response()->json($user->friends()->where('accepted', 0)->get(), 200);
    }

    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return response()->json(null, 204);
    }

    public function friendRequest( Request $request ) {
        $requested = User::findOrFail($request->user_requested_id);
        $reciever = User::findOrFail($request->user_reciever_id);

        $requested->friends()->attach($reciever);
        $reciever->friends()->attach($requested);

        return response()->json($requested->friends()->where('accepted', 0)->get(), 200);
    }

}
