<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\VideoRepository;

class DashboardController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;
    /**
     * @var VideoRepository
     */
    protected $videos;
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * DashboardController constructor.
     * @param UserRepository $users
     * @param VideoRepository $videos
     * @param PostRepository $posts
     */
    public function __construct(UserRepository $users, VideoRepository $videos, PostRepository $posts)
    {
        $this->users = $users;
        $this->videos = $videos;
        $this->posts = $posts;
    }

    public function index()
    {
        $users_count = $this->users->count();

        $videos_count = $this->videos->count();

        $posts_count = $this->posts->count();

        $surveys_count = 0;

        return view('admin.index', compact('users_count', 'videos_count', 'posts_count', 'surveys_count'));
    }
}
