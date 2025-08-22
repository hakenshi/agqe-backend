<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::orderBy('first_name')->get());
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        return new UserResource($user);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only(['cpf', 'first_name', 'second_name', 'occupation', 'birth_date', 'joined_at', 'color']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->filled('photo')) {
            $data['photo'] = $request->photo;
        }

        $user->update($data);

        return new UserResource($user);
    }

    public function destroy(User $user)
    {
        // Photo deletion handled by frontend/Cloudflare R2

        $user->delete();

        return new UserResource($user);
    }
}