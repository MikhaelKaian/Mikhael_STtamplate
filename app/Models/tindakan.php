<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tindakan extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    protected $primarykey = 'id';
    protected $table = 'tindakans'; // Nama tabel
    protected $fillable = [
        'id',
        'nama_pasien',
        'faskes_pencatat',
        'faskes_pencatat',
        'jenis_pemeriksan',
        'tanggal_kunjungan_pasien',
        'tanggal_pemeriksaan_lab',
        'jenis_parasit',
        'derajat_malaria',
        'kekambuhan',
        'tanggal_gejala',
        'gametosit',
        'anemia',
        'klasifikasi_khusus',
        'tanggal_pengobatan',
        'DHP',
        'primaquine',
        'status_pengobatan',
        'perawatan',
        'kematian_dengan_malaria',
        'status_monitoring'
    ];
    //  public function pasien()
    // {
    //     return $this->belongsTo(Pasien::class, 'id_pasien');
    // }

    public static function getDataTindakan()
   {
     $tindakans = tindakan::all();

    $tindakans_filter = [];

    $no = 1;
    for ($i=0; $i < $tindakans->count(); $i++){
        $tindakans_filter[$i]['no'] = $no++;
        $tindakans_filter[$i]['nama_pasien'] = $tindakans[$i]->nama_pasien;
        $tindakans_filter[$i]['faskes_pencatat'] = $tindakans[$i]->faskes_pencatat;
        $tindakans_filter[$i]['jenis_pemeriksan'] = $tindakans[$i]->jenis_pemeriksan;
        $tindakans_filter[$i]['tanggal_kunjungan_pasien'] = $tindakans[$i]->tanggal_kunjungan_pasien;
        $tindakans_filter[$i]['tanggal_pemeriksaan_lab'] = $tindakans[$i]->tanggal_pemeriksaan_lab;
        $tindakans_filter[$i]['jenis_parasit'] = $tindakans[$i]->jenis_parasit;
        $tindakans_filter[$i]['derajat_malaria'] = $tindakans[$i]->derajat_malaria;
        $tindakans_filter[$i]['kekambuhan'] = $tindakans[$i]->kekambuhan;
        $tindakans_filter[$i]['tanggal_gejala'] = $tindakans[$i]->tanggal_gejala;
        $tindakans_filter[$i]['gametosit'] = $tindakans[$i]->gametosit;
        $tindakans_filter[$i]['anemia'] = $tindakans[$i]->anemia;
        $tindakans_filter[$i]['klasifikasi_khusus'] = $tindakans[$i]->klasifikasi_khusus;
        $tindakans_filter[$i]['tanggal_pengobatan'] = $tindakans[$i]->tanggal_pengobatan;
        $tindakans_filter[$i]['DHP'] = $tindakans[$i]->DHP;
        $tindakans_filter[$i]['primaquine'] = $tindakans[$i]->primaquine;
        $tindakans_filter[$i]['status_pengobatan'] = $tindakans[$i]->status_pengobatan;
        $tindakans_filter[$i]['perawatan'] = $tindakans[$i]->perawatan;
        $tindakans_filter[$i]['kematian_dengan_malaria'] = $tindakans[$i]->kematian_dengan_malaria;
    }
    return $tindakans_filter;
   }
}
