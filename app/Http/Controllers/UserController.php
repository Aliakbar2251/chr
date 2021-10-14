<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $user = new User();

        $user->full_name = $request->input('full_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json($user);

    }

    /**
     * Display the specified resource.
     *
     * @param  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($user_id): JsonResponse
    {
        $user = User::findOrFail($user_id);

        return response()->json($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, $user_id): JsonResponse
    {
        $user = User::findOrFail($user_id);

        $user->full_name = $request->input('full_name');
        $user->email     = $request->input('email');
        $user->password  = bcrypt($request->input('password'));
        $user->save();

        return response()->json($user);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($user_id): JsonResponse
    {
        $user = User::findOrFail($user_id);

        $user->delete();

        return response()->json('User Deleted');
    }
}
