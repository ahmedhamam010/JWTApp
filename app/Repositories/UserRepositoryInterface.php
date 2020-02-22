<?php 

namespace App\Repositories;
use Illuminate\Http\Request;
interface UserRepositoryInterface
{
    public function login(Request $request);
    
    public function register(Request $request);
    

}