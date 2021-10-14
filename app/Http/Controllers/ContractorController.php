<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\Contractor;
use Illuminate\Http\JsonResponse;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $contractors = Contractor::all();

        return response()->json($contractors);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(ContractorRequest $request): JsonResponse
    {
        $contractor = Contractor::create($request->all());

        return response()->json($contractor,201);
    }


    /**
     * Display the specified resource.
     *
     * @param  $contractor_id
     * @return JsonResponse
     */
    public function show($contractor_id): JsonResponse
    {
        $contractor = Contractor::findOrFail($contractor_id);

        return response()->json($contractor);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  $contractor_id
     * @return JsonResponse
     */
    public function update(ContractorRequest $request, $contractor_id): JsonResponse
    {
        $contractor = Contractor::findOrFail($contractor_id);

        $contractor->full_name = $request->input('full_name');
        $contractor->save();

        return response()->json($contractor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $contractor_id
     * @return JsonResponse
     */
    public function destroy($contractor_id): JsonResponse
    {
        $contractor = Contractor::findOrFail($contractor_id);

        $contractor->delete();

        return response()->json('Contractor deleted',);
    }
}
