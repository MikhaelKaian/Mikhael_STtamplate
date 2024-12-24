<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id_pasien');
            $table->string('nama_pasien',60);
            $table->integer('usia');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->integer('berat_badan');
            $table->string('pekerjaan',60);
            $table->text('alamat');
            $table->string('no_telepon_pasien');
            $table->string('kecamatan_domisili');
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
        Schema::dropIfExists('pasiens');
    }
}
