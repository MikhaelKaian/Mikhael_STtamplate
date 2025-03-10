<?php

namespace App\Exports;

use App\Http\Controllers\TindakanController;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\tindakan;
use App\Models\pasien;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class LaporanTindakanExport implements FromView, ShouldAutoSize
{
    public $pasiens;
    public $tindakans;

    public function __construct($pasiens, $tindakans)
    {
        $this->pasiens = $pasiens;
        $this->tindakans = $tindakans;
    }

    public function view(): View
    {
        return view('export.malaria', [
            'pasiens' => $this->pasiens,
            'tindakans' => $this->tindakans,
        ]);
    }

    // public function array(): array
    // {
    //     return Pasien::getDataPasien();
    //     return Tindakan::getDataTindakan();
    // }
    // public function heading(): array
    // {
    //     return [
    //     'nama_pasien',
    //     'usia',
    //     'jenis_kelamin',
    //     'berat_badan',
    //     'pekerjaan',
    //     'alamat',
    //     'no_telepon_pasien',
    //     'kecamatan_domisili'
    //     ];
    // }
}