<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthService{

    /**
     * signup
     *
     * @param  mixed $request
     * @return void
     */
    public function signup($request){

        $validate = $request->validate([
            'name'=> "required",
            'email' => 'required |email ',
            'password' => 'required |min:6 |confirmed'
        ]);
        if(!$validate){
            return sendError($validate->getMessage(),null);
        }
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password)
        ]);
        if(!$user){
            return sendError("failed to create user",null);
        }
        $user['token'] = $user->createToken('token')->accessToken;
        return sendSuccess("User created succseefully",$user);
    }

    /**
     * signin
     *
     * @param  mixed $request
     * @return void
     */
    public function signin($request){

        $validate = Validator::make($request->all(), [
            'email'=> 'required |email |exists:users,email',
            'password' => 'required |min:6'
        ],[
            'email.exists'=> "emial does not exist"
        ]);
        if($validate->fails()){
            return sendError($validate->errors(),null);
        }
        $data =[
            'email' => $request->email,
            'password' => $request->password
        ];
        if (auth()->attempt($data)) {
            $user = Auth()->user();
            $user['token'] = $user->createToken('token')->accessToken;
            return sendSuccess('Login successfully',$user);
        }
        return sendError('Email or Password is incorrect',null);
    }
}
