<?php

namespace App\Http\Controllers\News\Admin;

use App\DTO\NewsPost\CreateNewsPostDtoFactory;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Services\NewsPost\NewsPostService;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    private PostRepositoryInterface $newsRepository;
    private NewsPostService $newsPostService;
    /**
     * Display a listing of the resource.
     */

    public function __construct(PostRepositoryInterface $newsRepository, NewsPostService $newsPostService)
    {
        parent::__construct();

        $this->authorizeResource(Post::class, 'post');

        $this->newsRepository = $newsRepository;
        $this->newsPostService = $newsPostService;
    }

    public function index(Request $request)
    {
        $posts = $this->newsRepository->getNewsPostsWithFilterPaginate($request, 20);

        return view('admin.newsposts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'asc')->get(['id', 'name']);

        return view('admin.newsposts.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        $dtoNewsPost = CreateNewsPostDtoFactory::fromRequest($request);

        $item = $this->newsPostService->createNewsPost($dtoNewsPost);

        if ($item) {
            return redirect()
                ->route('admin.posts.edit', $item->id)
                ->with(['success' => __('admin.save_success')]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.newsposts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('id', 'asc')->get(['id', 'name']);

        return view('admin.newsposts.form', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $dtoNewsPost = CreateNewsPostDtoFactory::fromRequest($request);
            $result = $this->newsPostService->updateNewsPostWithId($post->id, $dtoNewsPost);

        } catch(\Throwable $e) {
            return back()
                ->with(['warning' => __('admin.save_error')])
                ->withInput();
        }

        if ($result) {
            return redirect()
                ->route('admin.posts.edit', $post->id)
                ->with(['success' => __('admin.save_success')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success', __('admin.delete_success'));

        return redirect()->route('admin.posts.index');
    }
}
