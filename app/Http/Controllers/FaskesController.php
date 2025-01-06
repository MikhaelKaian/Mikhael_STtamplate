<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Faskes;
use TheSeer\Tokenizer\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class FaskesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
       $user = Auth::user();
       return view('home', compact('user'));
    }
    public function faskes()
    {
        $user = Auth::user();
        $faskes = Faskes::all();
        return view('faskes', compact('user', 'faskes'));
    }

    public function submit_faskes(Request $req)
     {
        $validate = $req->validate([
            'faskes_pencatat' => 'required|max:255',
            'jenis_faskes' => 'required',
            'faskes_domisili' => 'required'
        ]);

        $faskes = new Faskes;
        $faskes->faskes_pencatat = $req->get('faskes_pencatat');
        $faskes->jenis_faskes = $req->get('jenis_faskes');
        $faskes->faskes_domisili = $req->get('faskes_domisili');

        $faskes->save();

        $notification = array(
            'message' => 'Data Faskes berhasiil ditambahkan','alert-type' => 'success'
        );

        return redirect()->route('faskes')->with($notification);
     }

     //ajax process
     public function getDataBuku($id){
        $faskes = Faskes::find($id);
        return response()->json($faskes);
     }

     public function update_faskes(Request $req) {
        $validate = $req->validate([
            'faskes_pencatat' => 'required|max:255',
            'jenis_faskes' => 'required',
            'faskes_domisili' => 'required'
        ]);

        $faskes = Faskes::findOrFail($req->get('id'));
        $faskes->faskes_pencatat = $req->get('faskes_pencatat');
        $faskes->jenis_faskes = $req->get('jenis_faskes');
        $faskes->faskes_domisili = $req->get('faskes_domisili');
        $faskes->save();

        $notification = array(
            'message' => 'Data faskes berhasiil diubah','alert-type' => 'success'
        );

        return redirect()->route('faskes.ubah')->with($notification);
    }

    public function delete_faskes($id)
    {
        $faskes = Faskes::findOrFail($id);
        try {
            $faskes->delete(); // Menghapus langsung dari objek model

            // Redirect dengan notifikasi sukses
            return redirect()->route('faskes')->with('success', 'Data berhasil dihapus');
        } catch (Exception $e) {
            // Redirect dengan notifikasi error jika terjadi kesalahan
            return redirect()->route('faskes')->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }


    // public function delete_faskes($id) {
    //     $faskes = Faskes::findOrFail($id);
    //     if($faskes)
    //     {
    //         try {
    //             Faskes::where('id', $id)->delete();

    //             return redirect()->to('faskes')->with('success', 'Data berhasil dihapus');
    //         } catch(Exception $e)
    //         {
    //             throw new Exception($e->getMessage());
    //         }
    //     } else {
    //         return redirect()->to('faskes')->with('error', 'Data tidak ditemukan');
    //     }
    // }


    // public function delete_book($id){
    //     $faskes = Faskes::find($id);

    //     $faskes->delete();

    //     $success = true;
    //     $message = "Data buku berhasil dihapus";

    //     return response()->json([
    //         'success' => $success,
    //         'message' => $message,
    //     ]);
    //  }

    //  public function print_books(){
    //     $books = Book::all();

    //     // $pdf = PDF::loadview('print_books',['books'=>$books]);
    //     //     return $pdf->download('data_buku.pdf');
    //  }


    //  public function export()
    //  {
    //   return Excel::download(new BookExport, 'books.xlsx');
    //  }

    //  public function import(Request $req)
    //  {
    //     Excel::import(new BookImport, $req->file('file'));

    //     $notification = array(
    //         'message' => 'Import data berhasil dilakukan',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('admin.books')->with($notification);
    //  }
}
