<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Contractor[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Contractor::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContractorRequest $request)
    {
        $request->validated();
        Contractor::create($request->all());
        return response()->json('Contractor created');
    }


    /**
     * Display the specified resource.
     *
     * @param int $contractor_id
     * @return \Illuminate\Http\Response
     */
    public function show($contractor_id)
    {
        return Contractor::findOrFail($contractor_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ContractorRequest $request, $contractor_id)
    {
        $request->validated();
        $contractor = Contractor::findOrFail($contractor_id);
        $contractor->full_name = $request->input('full_name');
        $contractor->save();
        return response()->json($contractor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($contractor_id)
    {
        $contractor = Contractor::findOrFail($contractor_id);
        $contractor->delete();
        return response()->json('Contractor deleted');
    }
}
