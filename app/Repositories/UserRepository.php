<?php 

namespace App\Repositories;
use JWTAuth;
use App\Tweet;
use App\User;
use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class UserRepository implements UserRepositoryInterface
{
    public function login(Request $request)
    {
        
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => __('text.Invalid Email or Password'),
            ], 401);
        }

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'name' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required',
                'date_of_birth' => 'required',
                'image' => 'required'],
            [
                'required' => __('text.The :attribute field is required.'),
                'unique' => __('text.The :attribute field is already taken'),
            ]
        );

        if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
        }
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->date_of_birth = $request->date_of_birth;
        $user->image = $request->image;
        $user->save();

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user,
        ], 200);
    }

}