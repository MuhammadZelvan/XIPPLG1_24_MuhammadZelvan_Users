<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $User = User::all();

        return response()->json([
            'status' => 200,
            'message' => 'User retrived successfully.',
            'data' => $User
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        $user = User::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User created successfully.',
            'data' => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found.',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved successfully.',
            'data' => $User
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found.',
            ], 404);
        }

        $request->validate(['name' => 'required|string']);
        $User->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully.',
            'data' => $User
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $User = User::find($id);

        if (!$User) {
            return response()->json([
                'status' => 404,
                'message' => 'User not found.',
            ], 404);
        }

        $User->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted successfully.',
        ], 200);
    }
}
