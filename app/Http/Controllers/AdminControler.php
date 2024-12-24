<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookExport;
use App\Imports\BookImport;
use App\Models\pasien;

class AdminControler extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
       $user = Auth::user();
       return view('home', compact('user'));
    }
    public function pasiens()
    {
        $user = Auth::user();
        $pasiens = Pasien::all();
        return view('pasien', compact('user', 'pasiens'));
    }

     public function submit_book(Request $req)
     {
        $validate = $req->validate([
            'nama_pasien' => 'required|max:255',
            'usia' => 'required',
            'jenis_kelamin' => 'required',
            'berat_badan' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'no_telepon_pasien' => 'required',
            'kecamatan_domisili' => 'required'
        ]);

        $pasien = new Pasien;
        $pasien->nama_pasien = $req->get('nama_pasien');
        $pasien->usia = $req->get('usia');
        $pasien->jenis_kelamin = $req->get('jenis_kelamin');
        $pasien->berat_badan = $req->get('berat_badan');
        $pasien->pekerjaan = $req->get('pekerjaan');
        $pasien->alamat = $req->get('alamat');
        $pasien->no_telepon_pasien = $req->get('no_telepon_pasien');
        $pasien->kecamatan_domisili = $req->get('kecamatan_domisili');

        $pasien->save();

        $notification = array(
            'message' => 'Data buku berhasiil ditambahkan','alert-type' => 'success'
        );

        return redirect()->route('pasiens')->with($notification);
     }

     //ajax process
     public function getDataBuku($id){
        $buku = Book::find($id);
        return response()->json($buku);
     }

    public function update_book(Request $req){
        $book = Book::find($req->get('id'));

        $validate = $req->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
        ]);

        $book->judul = $req->get('judul');
        $book->penulis = $req->get('penulis');
        $book->tahun = $req->get('tahun');
        $book->penerbit = $req->get('penerbit');

        $book->save();

        $notification = array(
            'message' => 'Data Buku berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.books')->with($notification);
     }

     public function delete_book($id){
        $book = Book::find($id);

        $book->delete();

        $success = true;
        $message = "Data buku berhasil dihapus";

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
     }


     public function print_books(){
        $books = Book::all();

        // $pdf = PDF::loadview('print_books',['books'=>$books]);
        //     return $pdf->download('data_buku.pdf');
     }


     public function export()
     {
      return Excel::download(new BookExport, 'books.xlsx');
     }
     
     public function import(Request $req)
     {
        Excel::import(new BookImport, $req->file('file'));

        $notification = array(
            'message' => 'Import data berhasil dilakukan',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.books')->with($notification);
     }
}