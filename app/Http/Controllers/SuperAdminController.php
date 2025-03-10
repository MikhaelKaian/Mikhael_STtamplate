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

class SuperAdminController extends Controller
{
    public function malariatindakan()
    {
        $user = Auth::user();
        $tindakans = Tindakan::all();
        $pasiens = Pasien::all(); // Ambil semua data dari tabel Pasien
        $faskes = Faskes::all();
        // $malaria = malaria::all();
        return view('monitoring-tindakan', compact('user', 'tindakans', 'pasiens', 'faskes',));
    }
    public function updateStatusMonitoring(Request $request, $id)
    {
        $tindakan = Tindakan::findOrFail($id);
        $tindakan->update([
            'status_monitoring' => $request->status_monitoring,
        ]);

        return redirect()->back()->with('success', 'Status monitoring berhasil diperbarui.');
    }
}
