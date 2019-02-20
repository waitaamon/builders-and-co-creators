<?php

namespace App\Providers;

use App\Repositories\Contracts\{ImageSliderRepository,
    PostRepository,
    TopicRepository,
    UserRepository,
    VideoRepository};
use App\Repositories\Eloquent\{EloquentImageSliderRepository,
    EloquentPostRepository,
    EloquentTopicRepository,
    EloquentUserRepository,
    EloquentVideoRepository};
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
        $this->app->bind(PostRepository::class, EloquentPostRepository::class);
        $this->app->bind(VideoRepository::class, EloquentVideoRepository::class);
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
