<?php

namespace App\Http\Controllers;

use App\Models\Pdb;
use Carbon\Carbon;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Protection;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\Style\Table;

class PdbExportController extends Controller
{
    public function exportToWord($id_pdb)
    {
        $pdb = Pdb::where("id", $id_pdb)->firstOrFail();
        
        Carbon::setLocale('id');
        
        $formattedDate = Carbon::parse($pdb->tanggal_lahir)->format('d/m/Y');
        $tanggalUnduh = Carbon::now()->translatedFormat('d F Y');
        
        $data = [
            'Nama PDB' => $pdb->nama_pdb,
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
            'Nama Ayah' => $pdb->nama_ayah,
            'Tahun Lahir Ayah' => $pdb->tahun_lahir_ayah,
            'Pendidikan Ayah' => $pdb->pendidikan_ayah,
            'Berkebutuhan Khusus Ayah' => $pdb->berkebutuhan_khusus_ayah,
            'Pekerjaan Ayah' => $pdb->pekerjaan_ayah,
            'Penghasilan Ayah' => $pdb->penghasilan_ayah,
            'Nama Ibu' => $pdb->nama_ibu,
            'Tahun Lahir Ibu' => $pdb->tahun_lahir_ibu,
            'Pendidikan Ibu' => $pdb->pendidikan_ibu,
            'Berkebutuhan Khusus Ibu' => $pdb->berkebutuhan_khusus_ibu,
            'Pekerjaan Ibu' => $pdb->pekerjaan_ibu,
            'Penghasilan Ibu' => $pdb->penghasilan_ibu,
            'Nama Wali' => $pdb->nama_wali ?? '-',
            'Tahun Lahir Wali' => $pdb->tahun_lahir_wali ?? '-',
            'Pendidikan Wali' => $pdb->pendidikan_wali ?? '-',
            'Pekerjaan Wali' => $pdb->pekerjaan_wali ?? '-',
            'Penghasilan Wali' => $pdb->penghasilan_wali ?? '-',
            'Email' => $pdb->email,
            'No HP' => $pdb->no_hp,
            'Status Pendaftaran' => $pdb->status_pendaftaran,
            'Catatan' => $pdb->catatan,
            // Tambahkan data lain sesuai kebutuhan
        ];
        
        $images = [
            'Kartu Keluarga' => $pdb->kartu_keluarga,
            'Akta Kelahiran' => $pdb->akta_kelahiran,
            'KTP Ayah' => $pdb->ktp_ayah,
            'KTP Ibu' => $pdb->ktp_ibu,
            'KTP Wali' => $pdb->ktp_wali,
        ];

        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        
        // Menggunakan realpath dan str_replace untuk mendapatkan path yang benar
        $kopSurat = storage_path('app/public/kop/kopsurat.png');
        $kopSurat = str_replace('\\', '/', $kopSurat); // Pastikan menggunakan forward slash
        
        $header = $section->addHeader();
        $header->addImage($kopSurat,[
            'height' => 82,
            'alignment' => Jc::CENTER,
        ]);
        
        $namaPdb = $data['Nama PDB'];
        $pageNumber = $section->addFooter();
        $pageNumber->addPreserveText(strtoupper('{PAGE} | FORMULIR PENDAFTARAN | ' . $namaPdb));
        
        $titleStyle = [
            'alignment' => Jc::CENTER,
            'bold' => true,
        ];

        $section->addText('FORMULIR PENDAFTARAN', 1, $titleStyle);
        $section->addText('Data Anak:', ['bold' => true]);

        // Menambahkan tabel
        $tableStyle = [
            'borderSize' => 6,
            'borderColor' => '999999',
            'cellMargin' => 80,
            'width' => 100 * 50,
        ];

        $phpWord->addTableStyle('myTableStyle', $tableStyle);
        $table = $section->addTable('myTableStyle');

        // Mengisi tabel dengan data
        foreach ($data as $label => $value) {
            // Menghapus 'Ayah' dari label
            $displayLabel = str_replace([' Ayah',' Ibu',' Wali',' PDB'], '', $label);

            $table->addRow();
            $table->addCell(2500)->addText($displayLabel);
            $table->addCell(250)->addText(':');
            $table->addCell(7250)->addText($value);

            // Menambahkan baris "Data Ayah" setelah "Alamat Tempat Tinggal"
            if ($label === 'Desa/Kelurahan') {
                // Menambahkan baris di luar tabel
                $section->addPageBreak();
                $section->addTextBreak(1); // Menambahkan jarak
                $section->addText('Data Ayah:', ['bold' => true]);

                // Melanjutkan tabel
                $table = $section->addTable('myTableStyle');
            } elseif ($label === 'Penghasilan Ayah') {
                // Menambahkan baris di luar tabel
                $section->addTextBreak(1); // Menambahkan jarak
                $section->addText('Data Ibu:', ['bold' => true]);

                // Melanjutkan tabel
                $table = $section->addTable('myTableStyle');
            } elseif ($label === 'Penghasilan Ibu') {
                // Menambahkan baris di luar tabel
                $section->addTextBreak(1); // Menambahkan jarak
                $section->addText('Data Wali:', ['bold' => true]);

                // Melanjutkan tabel
                $table = $section->addTable('myTableStyle');
            }   elseif ($label === 'Penghasilan Wali') {
                // Menambahkan baris di luar tabel
                $section->addPageBreak();
                $section->addTextBreak(1); // Menambahkan jarak
                $section->addText('Kontak:', ['bold' => true]);

                // Melanjutkan tabel
                $table = $section->addTable('myTableStyle');
            }
        }
        
        $signatureStyle = [
            'alignment' => Jc::END,
            'spaceAfter' => 0,
        ];
        
        $section->addTextBreak(5);
        $section->addText('Gunungputri, '. $tanggalUnduh, null, $signatureStyle);
        $section->addText('Kepala PAUD Bunga Pandan', null, $signatureStyle);
        $section->addTextBreak(3);
        $section->addText('NURHAIMI', null, $signatureStyle);
        
        foreach ($images as $label => $image ) {
            if ($image === null) {
                $section->addPageBreak();
                $section->addText($label, ['bold' => true]);
                $section->addText('Tidak Ada');
            } else {
                $section->addPageBreak();
                $section->addText($label, ['bold' => true]);
                $imagePath = storage_path('app/public/'.$image);
                $imagePath = str_replace('\\', '/', $imagePath);
                $section->addImage($imagePath, [
                    'width' => 458,
                ]);
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
