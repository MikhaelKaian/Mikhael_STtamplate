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

class MalariaControler extends Controller
{
    public function malaria()
{
    $user = Auth::user();
    $tindakans = Tindakan::all();
    $pasiens = Pasien::all(); // Ambil semua data dari tabel Pasien
    $faskes = Faskes::all();
    // $malaria = malaria::all();
    return view('malaria', compact('user', 'tindakans', 'pasiens', 'faskes',));
}
}
