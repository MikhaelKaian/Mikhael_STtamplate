<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\tindakan;
use App\Models\pasien;
use App\Models\faskes;

class TindakanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
       $user = Auth::user();
       return view('home', compact('user'));
    }
    public function tindakans()
{
    $user = Auth::user();
    $tindakans = Tindakan::all();
    $pasiens = Pasien::all(); // Ambil semua data dari tabel Pasien
    $faskes = Faskes::all();
    return view('tindakan', compact('user', 'tindakans', 'pasiens', 'faskes',));
}

public function store(Request $request)
    {
                // dd($request);
               // Validasi input
               $validated = $request->validate([
                'nama_pasien' => 'required', // nama_pasien adalah pasien_id
                'faskes_pencatat' => 'required',
                'jenis_pemeriksan' => 'required|string|max:255',
                'tanggal_kunjungan_pasien' => 'required|date',
                'tanggal_pemeriksaan_lab' => 'required|date',
                'jenis_parasit' => 'required|string|max:255',
                'derajat_malaria' => 'required|string|max:255',
                'kekambuhan' => 'required|string|max:255',
                'tanggal_gejala' => 'required|date',
                'gametosit' => 'required|string|max:255',
                'anemia' => 'required|string|max:255',
                'klasifikasi_khusus' => 'required|string|max:255',
                'tanggal_pengobatan' => 'required|date',
                'DHP' => 'required|string|max:255',
                'primaquine' => 'required|string|max:255',
                'status_pengobatan' => 'required|string|max:255',
                'perawatan' => 'required|string',
                'kematian_dengan_malaria' => 'required|string|max:255',
            ]);
            // dd($validated);
            // Simpan data ke tabel tindakan
            Tindakan::create([
                'nama_pasien' => $validated['nama_pasien'], // nama_pasien disimpan sebagai pasien_id
                'faskes_pencatat' => $validated['faskes_pencatat'],
                'jenis_pemeriksan' => $validated['jenis_pemeriksan'],
                'tanggal_kunjungan_pasien' => $validated['tanggal_kunjungan_pasien'],
                'tanggal_pemeriksaan_lab' => $validated['tanggal_pemeriksaan_lab'],
                'jenis_parasit' => $validated['jenis_parasit'],
                'derajat_malaria' => $validated['derajat_malaria'],
                'kekambuhan' => $validated['kekambuhan'],
                'tanggal_gejala' => $validated['tanggal_gejala'],
                'gametosit' => $validated['gametosit'],
                'anemia' => $validated['anemia'],
                'klasifikasi_khusus' => $validated['klasifikasi_khusus'],
                'tanggal_pengobatan' => $validated['tanggal_pengobatan'],
                'DHP' => $validated['DHP'],
                'primaquine' => $validated['primaquine'],
                'status_pengobatan' => $validated['status_pengobatan'],
                'perawatan' => $validated['perawatan'],
                'kematian_dengan_malaria' => $validated['kematian_dengan_malaria'],
            ]);


        // Simpan data ke database
        // Tindakan::create($validated);

        return redirect()->back()->with('success', 'Data tindakan berhasil ditambahkan.');
    }
}
