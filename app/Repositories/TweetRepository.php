<?php 

namespace App\Repositories;
use JWTAuth;
use App\Tweet;
use App\User;
use App\Follower;
use App\Http\Requests\TweetFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class TweetRepository implements TweetRepositoryInterface
{
    public function index()
    {      
        return response()->json([ Auth::user()->followings()->with('tweets')->paginate(1) ]);
    }

    public function store(Request $request)
    {
        
        $user = JWTAuth::parseToken()->authenticate();
        $tweet = new Tweet();
        $tweet->description = $request->description;
        

        if ($user->tweets()->save($tweet))
            return response()->json([
                'success' => true,
                'tweet' => $tweet
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => __('text.could not be added')
            ], 500);
    }

    public function destroy($id)
{
    $user = JWTAuth::parseToken()->authenticate();
    $tweet = $user->tweets()->find($id);

    if (!$tweet) {
        return response()->json([
            'success' => false,
            'message' => __('text.Sorry, tweet cannot be found.')
        ], 400);
    }

    if ($tweet->delete()) {
        return response()->json([
            'success' => true,
            'message' => __('text.deleted successfully')
        ]);
    } else {
        return response()->json([
            'success' => false,
            'message' => __('text.Tweet could not be deleted.')
        ], 500);
    }
}

}