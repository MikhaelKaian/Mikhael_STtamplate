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
    ];
     public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
