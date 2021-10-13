<?php

namespace App\Http\Controllers;

use App\Http\Requests\PassportRequest;
use App\Models\Passport;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class PassportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Passport[]|\Illuminate\Database\Eloquent\Collection|Response
     */
    public function index()
    {
        return Passport::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(PassportRequest $request): JsonResponse
    {
        $request->validated();
        Passport::create($request->all());
        return response()->json('Passport created');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($passport_id): Response
    {
        return Passport::findOrFail($passport_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $passport_id
     * @return JsonResponse
     */
    public function update(PassportRequest $request, $passport_id): JsonResponse
    {
        $request->validated();
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
