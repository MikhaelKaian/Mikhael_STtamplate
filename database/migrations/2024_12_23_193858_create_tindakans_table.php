<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTindakansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tindakans', function (Blueprint $table) {
            $table->bigIncrements('id_tindakan');
            $table->string('jenis_pemerikasan');
            $table->date('tanggal_kunjungan_pasien');
            $table->date('tanggal_pemeriksaan_lab');
            $table->string('jenis_parasit');
            $table->string('derajat_malaria');
            $table->string('kekambuhan');
            $table->date('tanggal_gejala');
            $table->string('gametosit');
            $table->string('anemia');
            $table->string('klasifikasi_khusus');
            $table->date('tanggal_pengobatan');
            $table->integer('DHP');
            $table->integer('primaquine');
            $table->string('status_pengobatan');
            $table->enum('perawatan', ['rawat_inap', 'rawat_jalan']);
            $table->string('kematian_dengan_malaria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tindakans');
    }
}
