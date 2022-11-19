<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function updateUsername(Request $request)
    {
        $request->validate([
            'username' =>['required', 'string', 'min:2', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)]
        ]);

        $user = auth()->user();
        $user->username = $request->get('username');
        $user->save();

        return back();
    }
}
