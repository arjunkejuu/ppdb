<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Table;

class PdbExportController extends Controller
{
    public function exportToWord($id_pdb)
    {
        $pdb = Pdb::where("id", $id_pdb)->firstOrFail();
        $formattedDate = Carbon::parse($pdb->tanggal_lahir)->format('d/m/Y');
        
        $data = [
            'Nama' => $pdb->nama_pdb,
            'Jenis Kelamin' => $pdb->jenis_kelamin,
            'Tanggal Lahir' => $formattedDate,
            'Tempat Lahir' => $pdb->tempat_lahir,
            'Agama' => $pdb->agama,
            'Berkebutuhan Khusus' => $pdb->berkebutuhan_khusus,
            'Tempat Tinggal' => $pdb->tempat_tinggal,
            'Anak Ke' => $pdb->anak_ke,
            'Transportasi' => $pdb->transportasi,
            'Alamat Tempat Tinggal' => $pdb->alamat_tempat_tinggal,
            'Desa/Kelurahan' => $pdb->desa,
            'Nama' => $pdb->nama_ayah,
            'Tahun Lahir' => $pdb->tahun_lahir_ayah,
            'Pendidikan' => $pdb->pendidikan_ayah,
            'Berkebutuhan Khusus' => $pdb->berkebutuhan_khusus_ayah,
            'Pekerjaan' => $pdb->pekerjaan_ayah,
            'Penghasilan' => $pdb->penghasilan_ayah,
            // Tambahkan data lain sesuai kebutuhan
        ];

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();

        $section->addTitle('Detail PDB', 1);

        // Menambahkan tabel
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '999999',
            'cellMargin' => 80,
            'width' => 100 * 50,
        ];

        $phpWord->addTableStyle('myTableStyle', $tableStyle);
        $section->addText('Data Anak:', ['bold' => true]);
        $table = $section->addTable('myTableStyle');

        // Mengisi tabel dengan data
        foreach ($data as $label => $value) {
            $table->addRow();
            $table->addCell(2000)->addText($label);
            $table->addCell(500)->addText(':');
            $table->addCell(8000)->addText($value);

            // Menambahkan baris "Data Ayah"
            if ($label === 'Desa/Kelurahan') {
                // Menambahkan teks di luar tabel
                $section->addTextBreak(1); // Menambahkan jarak
                $section->addText('Data Ayah Kandung:', ['bold' => true]);
    
                // Melanjutkan tabel
                $table = $section->addTable('myTableStyle');
            }
        }

        // Menyimpan dokumen ke output
        $fileName = 'detail_pdb_'.$pdb->nama_pdb.'.docx';
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }
}
