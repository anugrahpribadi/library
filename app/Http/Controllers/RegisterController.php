<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $data['roles'] = \Spatie\Permission\Models\Role::get(['id', 'name']);
        $data['permissions'] = \App\Models\Permission::whereNull('parent_id')->get(['id', 'name']);
        return view('admin.user.register', $data);
    }

    public function store(UserUpdateRequest $request)
    {
        $api = app(\App\Http\Controllers\Admin\UserController::class);
        $payload = request()->except(['_method', '_token']);
        $payload = $api->prepareData($payload);

        \DB::transaction(function() use($payload) {
            $this->user = User::create($payload);
        });

        return redirect()->route('login')->with('status', 'User successfully created.');
    }
}
