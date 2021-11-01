<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContractorRequest;
use App\Models\Contractor;
use Illuminate\Http\JsonResponse;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

        return response()->json($contractor, 201);
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

        return response()->json('Contractor deleted');
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export(): JsonResponse
    {
        $contractors = Contractor::with(['mainPhone', 'mainAddress', 'passport'])->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Full Name');
        $sheet->setCellValue('B1', 'Phone');
        $sheet->setCellValue('C1', 'Address');
        $sheet->setCellValue('D1', 'Serial Number');
        $rowCount = 2;

        foreach ($contractors as $contractor) {
            $sheet->setCellValue('A' . $rowCount, $contractor->full_name);
            $sheet->setCellValue('B' . $rowCount, $contractor->mainPhone ? $contractor->mainPhone->body : 'Doesnt exist');
            $sheet->setCellValue('C' . $rowCount, $contractor->mainAddress ? $contractor->mainAddress->body : 'Doesnt exist');
            $sheet->setCellValue('D' . $rowCount, $contractor->passport ? $contractor->passport->serial_number : 'Doesnt exist');
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("ContractorInfo.xlsx");

        return response()->json('File successfully saved');
    }


}
