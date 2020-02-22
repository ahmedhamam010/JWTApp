<?php

namespace App\Providers;

use App\Repositories\FollowerRepository;
use App\Repositories\FollowerRepositoryInterface;
use App\Repositories\TweetRepository;
use App\Repositories\TweetRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind( UserRepositoryInterface::class , UserRepository::class );
        $this->app->bind( TweetRepositoryInterface::class , TweetRepository::class );
        $this->app->bind( FollowerRepositoryInterface::class , FollowerRepository::class );
    }
}
