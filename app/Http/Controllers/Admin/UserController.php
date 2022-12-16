<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::query()->filter()->paginate(50)->withQueryString();
        $users->append('created_at_date_string');
        $users->links = $users->onEachSide(1)->links();

        $sort = \request()->get('sort');
        $direction = \request()->get('direction');

        return Inertia::render('Admin/User/Index', compact('users', 'sort', 'direction'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = User::query()
            ->where('username', $username)
            ->with('tracking')
            ->firstOrFail();

        return Inertia::render('Admin/User/Show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::query()->where('username', $username)->firstOrFail();
        $userId = $user->id;

        $userModel = new User();
        $roles = $userModel->roles;

        return Inertia::render('Admin/User/Edit', compact('user', 'userId', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $userModel = new User();

        $request->validate([
            'name' => ['required', 'string', 'min:1', 'max:255'],
            'role' => ['required', 'string', 'min:1', 'max:255', Rule::in($userModel->roles),],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
            'username' => ['required', 'string', 'min:1', 'max:36', Rule::unique('users')->ignore($userId)],
        ]);

        $username = $request->get('username');

        User::query()->where('id', $userId)
            ->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'username' => $username,
                'role' => $request->get('role'),
            ]);

        return redirect()->route('admin.user.show', $username)->with('flash.success', 'User Data Updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
