<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Phone;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TestController extends Controller
{
    /**
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        $contractors = Contractor::with(['mainPhone', 'mainAddress', 'passport'])->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Full Name');
        $sheet->setCellValue('B1', 'Phone');
        $sheet->setCellValue('C1', 'Address');
        $sheet->setCellValue('D1', 'Passport Number');
        $rowCount = 2;

        foreach ($contractors as $contractor) {
            $sheet->setCellValue('A' . $rowCount, $contractor->full_name);
            $sheet->setCellValue('B' . $rowCount, $contractor->mainPhone ? $contractor->mainPhone->body : 'Doesnt exist');
            $sheet->setCellValue('C' . $rowCount, $contractor->mainAddress ? $contractor->mainAddress->body : 'Doesnt exist');
            $sheet->setCellValue('D' . $rowCount, $contractor->passport ? $contractor->passport->national_id : 'Doesnt exist');
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save("ContractorInfo.xlsx");

        return response()->json('File successfully saved');
    }

}
