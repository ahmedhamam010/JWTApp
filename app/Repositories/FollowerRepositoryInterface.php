<?php 

namespace App\Repositories;
use Illuminate\Http\Request;
interface FollowerRepositoryInterface
{
    public function store(Request $request);
}