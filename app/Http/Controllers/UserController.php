<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserListRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\Filters\UserFilters;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserListRequest $request)
    {
        $filters = (new UserFilters($request));
        $users = User::select('id', 'name', 'email', 'role_id', 'created_at', 'updated_at')
            ->filter($filters)
            ->orderBy('id', 'asc')
            ->paginate(50);

        $roles = Role::select('id', 'name')->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::select('id', 'name')->get();
        return view('admin.users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        try {
            $requestArray = $request->validated();
            if ($request->has('image')) {
                $imagePath = $request->file('image')?->store(config('filesystems.local_paths.user_images'));
                $requestArray['image'] = $imagePath;
            }
            $requestArray['password'] = Hash::make($requestArray['password']);
            $user = User::create($requestArray);
        } catch(\Throwable $e) {
            Log::channel('database')->critical($e->getMessage());
            return back()
                ->withErrors(['warning' => __('admin.save_error')])
                ->withInput();
        }

        return redirect()
            ->route('admin.users.edit', $user)
            ->with(['success' => __('admin.save_success')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::select('id', 'name')->get();
        return view('admin.users.form', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $error = false;
        $requestArray = $request->validated();

        if ($request->has('image')) {
            $imagePath = $request->file('image')?->store(config('filesystems.local_paths.user_images'));
            $requestArray['image'] = $imagePath;
        }

        if ($request->has('password') && $requestArray['password'] !== null) {
            $requestArray['password'] = Hash::make($requestArray['password']);
        } else {
            unset($requestArray['password']);
        }

        if ($user->hasAnyRole('admin')
            && User::select('id')
                ->withAdminRole()
                ->get()->count() < 2
            && ((int)$requestArray['role_id'] !== Role::select('id')->admin()->first()->id)) {
            $error =  __('admin.admin_exist_update_error');
        }

        if (!$error) {
            try {
                $user->update($requestArray);
            } catch(\Throwable $e) {
                Log::channel('database')->critical($e->getMessage());
                $error =  __('admin.save_error');
            }
        }

        if ($error) {
            return back()
                ->withErrors(['warning' => $error])
                ->withInput();
        }

        return redirect()
            ->route('admin.users.edit', $user)
            ->with(['success' => __('admin.save_success')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->hasAnyRole('admin')
            && User::select('id')
                ->withAdminRole()
                ->get()->count() < 2) {
            return back()
                ->withErrors(['warning' => __('admin.admin_exist_delete_error')])
                ->withInput();
        }

        $user->delete();
        session()->flash('success', __('admin.delete_success'));
        return redirect(route('admin.users.index'));
    }
}
