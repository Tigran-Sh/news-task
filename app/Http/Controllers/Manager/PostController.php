<?php
declare(strict_types=1);

namespace App\Http\Controllers\Manager;

use App\Http\Requests\PostRequestCreate;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @var PostRepository
     */
    protected $postRepository;

    /**
     * PostController constructor.
     * @param CategoryRepository $categoryRepository
     * @param PostRepository $postRepository
     */
    public function __construct(CategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = $this->postRepository->all();

        return view('manager.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return Factory|Application|View
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAllCategories();

        return view('manager.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequestCreate $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(PostRequestCreate $request)
    {
        $validatedData = $request->validated();

        $this->postRepository->createNewPost($validatedData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id)
    {
        $post = $this->postRepository->getPostWithPivot($id);

        return view('manager.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $post = $this->postRepository->getPostWithPivot($id);
        $selectedCategories = $post->categories()->pluck('id')->toArray();
        $categories = $this->categoryRepository->getAllCategories();

        return view('manager.edit', compact('post', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, int $id): RedirectResponse
    {
        $validatedData = $request->validated();
        $this->postRepository->updatePost($validatedData, $id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->postRepository->deletePost($id);

        return redirect()->back();
    }
}
