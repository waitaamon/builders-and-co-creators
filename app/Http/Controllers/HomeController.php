<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\PostRepository;
use App\Repositories\Contracts\VideoRepository;
use App\Repositories\Eloquent\Criteria\EagerLoad;

class HomeController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $posts;
    /**
     * @var VideoRepository
     */
    protected $videos;

    /**
     * Create a new controller instance.
     *
     * @param PostRepository $posts
     * @param VideoRepository $videos
     */
    public function __construct(PostRepository $posts, VideoRepository $videos)
    {
        $this->posts = $posts;
        $this->videos = $videos;
    }

    /**
     * Show the application index page.
     */
    public function index()
    {
        $posts = $this->posts->withCriteria(
            new EagerLoad(['topics'])
        )->paginate(6);

        $videos = $this->videos->withCriteria(
            new EagerLoad(['topics'])
        )->paginate(6);

        return view('index', compact('posts', 'videos'));
    }

    /**
     * Show the application about page.
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show the application blog page.
     */
    public function blog()
    {
        return view('blog');
    }
}
