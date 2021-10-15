<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassportRequest;
use App\Models\Passport;
use Illuminate\Http\JsonResponse;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $passports = Passport::all();

        return response()->json($passports);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(PassportRequest $request): JsonResponse
    {
        $passport = Passport::create($request->all());

        return response()->json($passport, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  $passport_id
     * @return JsonResponse
     */
    public function show($passport_id): JsonResponse
    {
        $passport = Passport::findOrFail($passport_id);

        return response()->json($passport);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $passport_id
     * @return JsonResponse
     */
    public function update(PassportRequest $request, $passport_id): JsonResponse
    {
        $passport = Passport::findOrFail($passport_id);

        $passport->update($request->all());
        $passport->save();

        return response()->json($passport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $passport_id
     * @return JsonResponse
     */
    public function destroy($passport_id): JsonResponse
    {
        $contractor = Passport::findOrFail($passport_id);

        $contractor->delete();

        return response()->json('Contractor deleted');
    }
}
