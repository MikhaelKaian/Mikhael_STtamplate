<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use App\Models\tindakan;
use App\Models\pasien;
use App\Models\faskes;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $jumlahpasien = pasien::count();
        // $jumlahMahasiswa = User::where('roles_id', 2)->count();
        // $jumlahSkripsi = Skripsi::count();
        // $jumlahSkripsiBelumDiverifikasi = Skripsi::where('status', 0)->count();
        // $jumlahSkripsiDiverifikasi = Skripsi::where('status', 1)->count();

        // if($user->roles_id == 2 && $user->status == 0){
        //     Auth::logout();
        //     $notification = array(
        //         'message' =>'Anda Belum Verifikasi', 'alert-type' =>'warning'
        //     );
        //     return redirect()->route('welcome')->with($notification);
        // }

        return view('home', compact('user', 'jumlahpasien'));
    }
}
