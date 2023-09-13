<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdCreateRequest;
use App\Http\Requests\AdListRequest;
use App\Http\Requests\AdUpdateRequest;
use App\Models\Ad;
use App\Services\Filters\AdFilters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdListRequest $request)
    {
        $filters = (new AdFilters($request));
        $ads = Ad::select('id', 'name', 'type', 'image', 'showdate_start', 'showdate_end', 'created_at', 'updated_at')
            ->filter($filters)
            ->orderBy('id', 'asc')
            ->paginate(50);

        $types = Ad::TYPES;

        return view('admin.ads.index', compact('ads', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ads.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdCreateRequest $request)
    {
        try {
            $requestArray = $request->validated();
            if ($request->has('image')) {
                $imagePath = $request->file('image')?->store(config('filesystems.local_paths.news_images'));
                $requestArray['image'] = basename($imagePath);
            }
            $ad = Ad::create($requestArray);
        } catch(\Throwable $e) {
            Log::channel('database')->critical($e->getMessage());
            return back()
                ->withErrors(['warning' => __('admin.save_error')])
                ->withInput();
        }

        return redirect()
            ->route('admin.ads.edit', $ad)
            ->with(['success' => __('admin.save_success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('admin.ads.show', compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ads.form', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdUpdateRequest $request, Ad $ad)
    {
        $error = false;
        $requestArray = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')?->store(config('filesystems.local_paths.news_images'));
            $requestArray['image'] = basename($imagePath);
        }

        try {
            $ad->update($requestArray);
        } catch(\Throwable $e) {
            Log::channel('database')->critical($e->getMessage());
            $error =  __('admin.save_error');
        }

        if ($error) {
            return back()
                ->withErrors(['warning' => $error])
                ->withInput();
        }

        return redirect()
            ->route('admin.ads.edit', $ad)
            ->with(['success' => __('admin.save_success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        session()->flash('success', __('admin.delete_success'));
        return redirect(route('admin.ads.index'));
    }
}
