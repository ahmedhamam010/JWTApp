<?php
namespace App\Http\Controllers;
use App\Repositories\TweetRepositoryInterface;
use JWTAuth;
use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TweetController extends Controller
{
    
    private $tweetRepository;

    public function __construct( TweetRepositoryInterface  $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function index()
    {      
        return $this->tweetRepository->index();
    }

    public function store(Request $request)
    {
        return $this->tweetRepository->store($request);
    }


public function destroy($id)
{
    return $this->tweetRepository->destroy($id);
}


}