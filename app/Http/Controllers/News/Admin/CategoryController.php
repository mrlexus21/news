<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Requests\NewsCategoryCreateRequest;
use App\Http\Requests\NewsCategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CategoryController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->authorizeResource(Category::class, 'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get(['id', 'name', 'created_at', 'updated_at']);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NewsCategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(NewsCategoryCreateRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);

        if ($category) {
            return redirect()
                ->route('admin.categories.edit', $category->id)
                ->with(['success' => __('admin.save_success')]);
        }

        return back()
            ->with(['warning' => __('admin.save_error')])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsCategoryUpdateRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(NewsCategoryUpdateRequest $request, Category $category)
    {
        $category = Category::find($category->id);

        if (empty($category)) {
            return back()
                ->with(['warning' => __('admin.record_id_not', ['id' => $category->id])])
                ->withInput();
        }

        $data = $request->validated();

        $result = $category
            ->update($data);

        if ($result) {
            return redirect()
                ->route('admin.categories.edit', $category->id)
                ->with(['success' => __('admin.save_success')]);
        }

        return back()
            ->with(['warning' => __('admin.save_error')])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('admin.delete_success'));
        return redirect()->route('admin.categories.index');
    }
}
