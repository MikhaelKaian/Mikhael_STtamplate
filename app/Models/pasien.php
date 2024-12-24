<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'usia',
        'jenis_kelamin',
        'berat_badan',
        'pekerjaan',
        'alamat',
        'no_telepon_pasien',
        'kecamatan_domisili'
    ];

   public static function getDataBooks()
   {
     $pasiens = Book::all();

    $pasiens_filter = [];

    $no = 1;
    for ($i=0; $i < $pasiens->count(); $i++){
        $pasiens_filter[$i]['no'] = $no++;
        $pasiens_filter[$i]['nama_pasien'] = $pasiens[$i]->nama_pasien;
        $pasiens_filter[$i]['usia'] = $pasiens[$i]->usia;
        $pasiens_filter[$i]['jenis_kelamin'] = $pasiens[$i]->jenis_kelamin;
        $pasiens_filter[$i]['berat_badan'] = $pasiens[$i]->berat_badan;
        $pasiens_filter[$i]['pekerjaan'] = $pasiens[$i]->pekerjaan;
        $pasiens_filter[$i]['alamat'] = $pasiens[$i]->alamat;
        $pasiens_filter[$i]['no_telepon_pasien'] = $pasiens[$i]->no_telepon_pasien;
        $pasiens_filter[$i]['kecamatan_domisili'] = $pasiens[$i]->kecamatan_domisili;
    }
    return $pasiens_filter;
   }
}
