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
            $table->id();
            $table->string('nama_pasien');
            $table->string('faskes_pencatat');
            $table->string('jenis_pemeriksan');
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
            $table->string('status_monitoring')->nullable();

            $table->timestamps();
            // $table->foreign('nama_pasien')->references('id')->on('pasiens')->onDelete('cascade');

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
