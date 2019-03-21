<?php

namespace App\Providers;

use App\Models\Directory\Country;
use App\Repositories\Contracts\{BodyRepository,
    CountryRepository,
    ImageSliderRepository,
    MembershipRepository,
    MembershipTypeRepository,
    NewLetterEmailRepository,
    PostRepository,
    TopicRepository,
    UserRepository,
    VideoRepository};
use App\Repositories\Eloquent\{EloquentBodyRepository,
    EloquentCountryRepository,
    EloquentImageSliderRepository,
    EloquentMembershipRepository,
    EloquentMembershipTypeRepository,
    EloquentNewsLetterEmailRepository,
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
        $this->app->bind(NewLetterEmailRepository::class, EloquentNewsLetterEmailRepository::class);
        $this->app->bind(CountryRepository::class, EloquentCountryRepository::class);
        $this->app->bind(BodyRepository::class, EloquentBodyRepository::class);
        $this->app->bind(MembershipRepository::class, EloquentMembershipRepository::class);
        $this->app->bind(MembershipTypeRepository::class, EloquentMembershipTypeRepository::class);
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
