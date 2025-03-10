<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\tindakan;
use App\Models\pasien;
use App\Models\faskes;
use App\Models\malaria;
use App\Exports\LaporanTindakanExport;
use Maatwebsite\Excel\Facades\Excel;

class MalariaControler extends Controller
{
    public function malariapasien()
    {
        $user = Auth::user();
        $tindakans = Tindakan::all();
        $pasiens = Pasien::all(); // Ambil semua data dari tabel Pasien
        $faskes = Faskes::all();
        // $malaria = malaria::all();
        return view('malaria-pasien', compact('user', 'tindakans', 'pasiens', 'faskes',));
    }
    public function malariatindakan()
    {
        $user = Auth::user();
        $tindakans = Tindakan::all();
        $pasiens = Pasien::all(); // Ambil semua data dari tabel Pasien
        $faskes = Faskes::all();
        // $malaria = malaria::all();
        return view('malaria-tindakan', compact('user', 'tindakans', 'pasiens', 'faskes',));
    }

    public function export(Request $request)
    {
    $periode = $request->periode;

    // Hitung tanggal berdasarkan periode waktu
    $startDate = now()->subMonths($periode)->startOfDay();
    $endDate = now()->endOfDay();

    // Filter data pasien dan tindakan
    $pasiens = Pasien::whereBetween('created_at', [$startDate, $endDate])->get();
    $tindakans = Tindakan::whereBetween('created_at', [$startDate, $endDate])->get();

    // Lakukan export menggunakan Excel
    return Excel::download(new LaporanTindakanExport($pasiens, $tindakans), "data_export_{$periode}_bulan.xlsx");
    }

    // public function updateStatusMonitoring(Request $request, $id)
    // {
    //     $tindakan = Tindakan::findOrFail($id);
    //     $tindakan->update([
    //         'status_monitoring' => $request->status_monitoring,
    //     ]);

    //     return redirect()->back()->with('success', 'Status monitoring berhasil diperbarui.');
    // }

}
