<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            //dd($authUser);
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;

            $success['username'] =  $authUser->username;
            $success['avatar_id'] =  $authUser->avatar_id;
            $success['user_id'] =  $authUser->user_id;


            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
        //        $validator = Validator::make($request->all(), [
        //            'email' => 'required|email',
        //            'password' => 'required',
        //            // 'confirm_password' => 'required|same:password',
        //        ]);
        //
        //        if($validator->fails()){
        //            return $this->sendError('Error validation', $validator->errors());
        //        }
        //        if(!Auth::attempt($request->only(['email', 'password']))) {
        //            return $this->error('', 'Credentials do not match', 401);
        //        }
        //
        //        $user = User::where('email', $request->email)->first();
        //
        //        return $this->sendResponse($user, 'User signed in');

    }
    public function signup(Request $request)
    {
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'avatar_id' => 'required',
            // 'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['username'] =  $user->username;
        $success['email'] =  $user->email;
        $success['password'] =  $user->password;
        $success['avatar_id'] = $user->avatar_id;
        $success['user_id'] =  $user->user_id;

        return $this->sendResponse($success, 'User created successfully.');
    }
}
