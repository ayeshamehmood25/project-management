<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('first_name')) {
            $query->where('first_name', 'like', "%{$request->first_name}%");
        }

        if ($request->has('last_name')) {
            $query->where('last_name', 'like', "%{$request->last_name}%");
        }

        if ($request->has('date_of_birth')) {
            $query->where('date_of_birth', $request->date_of_birth);
        }

        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->has('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
