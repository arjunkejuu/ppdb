<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataPdbExportController extends Controller
{
    //
    public function exportData($status = null)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        $columns = [
            'A' => 'nama_pdb',
            'B' => 'jenis_kelamin',
            'C' => 'tanggal_lahir',
            'D' => 'tempat_lahir',
            'E' => 'agama',
            'F' => 'berkebutuhan_khusus',
            'G' => 'tempat_tinggal',
            'H' => 'anak_ke',
            'I' => 'transportasi',
            'J' => 'alamat_tempat_tinggal',
            'K' => 'desa',
            'L' => 'status_formulir',
            'M' => 'status_registrasi'
        ];
        
        foreach ($columns as $column => $attribute) {
            $sheet->setCellValue($column . '1', strtoupper(str_replace('_', ' ', $attribute)));
            $sheet->getStyle($column . '1')->getFont()->setBold(true); // Set bold
            $sheet->getStyle($column . '1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            $sheet->getStyle($column . '1')->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        }
        
        if ($status) {
            $pdbs = Pdb::where('status_formulir', $status)->get();
        } else {
            $pdbs = Pdb::all();
        }
        
        $row = 2;
        foreach ($pdbs as $pdb) {
            foreach ($columns as $column => $attribute) {
                if ($attribute == 'tanggal_lahir') {
                    // Format tanggal lahir menggunakan Carbon
                    $formattedDate = Carbon::parse($pdb->tanggal_lahir)->format('d/m/Y');
                    $sheet->setCellValue($column . $row, Date::PHPToExcel($formattedDate));
                    $sheet->getStyle($column . $row)->getNumberFormat()->setFormatCode('DD/MM/YYYY');
                } else {
                    $sheet->setCellValue($column . $row, $pdb->{$attribute});
                }
            }
            $row++;
        }
        
        foreach ($columns as $column => $attribute) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }
        
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Seluruh_PDB_'.$status.'.xlsx';
        $writer->save($filename);
        
        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
