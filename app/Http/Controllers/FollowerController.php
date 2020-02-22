<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follower;
use App\Repositories\FollowerRepositoryInterface;
use App\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
class FollowerController extends Controller
{
    private $followerRepository;
    
    public function __construct( FollowerRepositoryInterface $followerRepository)
    {
        $this->followerRepository = $followerRepository;
    }

    public function store(Request $request)
    {
        return $this->followerRepository->store($request);
    }

    
}
