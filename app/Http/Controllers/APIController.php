<?php 
namespace App\Http\Controllers;

use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\RegistrationFormRequest;
use App\Repositories\UserRepositoryInterface;

class APIController extends Controller
{
    
    private $userRepository;
    
    public function __construct( UserRepositoryInterface  $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function login(Request $request)
    {
        return $this->userRepository->login($request);
    }


    public function register(Request $request)
    {
        return $this->userRepository->register($request);
    }
}