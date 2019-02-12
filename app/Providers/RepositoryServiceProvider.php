<?php

namespace App\Providers;

use App\Repositories\Contracts\{ImageSliderRepository, TopicRepository, UserRepository};
use App\Repositories\Eloquent\{EloquentImageSliderRepository, EloquentTopicRepository, EloquentUserRepository};
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(ImageSliderRepository::class, EloquentImageSliderRepository::class);
        $this->app->bind(TopicRepository::class, EloquentTopicRepository::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
