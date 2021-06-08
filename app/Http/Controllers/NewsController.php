<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * NewsController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $search = request()->get('search') ?? '';
        $news = $this->postRepository->all($search);

        return view('news.index',compact('news'));
    }

    public function show($slug)
    {
        $post = $this->postRepository->findPostBySlug($slug);

        if (!$post) {
            abort(404);
        }

        return view('news.show', compact('post'));
    }
}
