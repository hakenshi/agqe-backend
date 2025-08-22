<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::orderBy('first_name')->get());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'required|string|size:14|unique:users',
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'occupation' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'birth_date' => 'required|date',
            'joined_at' => 'required|date',
            'color' => 'required|in:black,pink,purple,blue,teal,red,indigo,yellow,green,gray,orange,cyan,lime',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('users', 'public');
        }

        $user = User::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuário criado com sucesso',
            'user' => $user,
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'cpf' => 'sometimes|string|size:14|unique:users,cpf,' . $user->id,
            'first_name' => 'sometimes|string|max:255',
            'second_name' => 'sometimes|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'occupation' => 'sometimes|string|max:255',
            'password' => 'sometimes|string|min:6',
            'birth_date' => 'sometimes|date',
            'joined_at' => 'sometimes|date',
            'color' => 'sometimes|in:black,pink,purple,blue,teal,red,indigo,yellow,green,gray,orange,cyan,lime',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['cpf', 'first_name', 'second_name', 'occupation', 'birth_date', 'joined_at', 'color']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $data['photo'] = $request->file('photo')->store('users', 'public');
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Usuário atualizado com sucesso',
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Usuário excluído com sucesso',
        ]);
    }
}