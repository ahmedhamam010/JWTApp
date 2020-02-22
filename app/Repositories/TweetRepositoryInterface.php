<?php 

namespace App\Repositories;

use App\Http\Requests\TweetFormRequest;
use Illuminate\Http\Request;
interface TweetRepositoryInterface
{
    public function index();
    public function store(Request $request);
    public function destroy($id);
}