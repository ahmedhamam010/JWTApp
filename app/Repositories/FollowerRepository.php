<?php 

namespace App\Repositories;
use JWTAuth;
use App\Tweet;
use App\User;
use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FollowerRepository implements FollowerRepositoryInterface
{
    public function store(Request $request)
    {
        
        $follower = new Follower();
        $follower->user_id = JWTAuth::toUser($request->token)->id;
        $follower->following_id = $request->id;
        
        $follower->save();
            
        
    
        return response()->json([ __('text.user followed') ]);
    }

}