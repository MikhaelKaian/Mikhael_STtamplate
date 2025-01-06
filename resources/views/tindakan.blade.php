@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Laporan Data Tindakan</h1>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Flash Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show position-fixed" 
                     style="top: 20px; right: 20px; z-index: 1050;" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Tindakan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('tindakans.route') }}">
                            @csrf
                            <br>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="nama_pasien">Nama Pasien</label>
                                    <select class="custom-select rounded-0" name="nama_pasien" id="nama_pasien" required>
                                        <option hidden>Masukkan Nama Pasien</option>
                                        @foreach (@$pasiens as $pasien)
                                            <option value="{{ $pasien->nama_pasien }}">{{ $pasien->nama_pasien }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="faskes_pencatat">Faskes Pencatat</label>
                                    <select class="custom-select rounded-0" name="faskes_pencatat" id="faskes_pencatat" required>
                                        <option hidden>Masukkan Faskes Pencatat</option>
                                        @foreach (@$faskes as $fas)
                                            <option value="{{ $fas->faskes_pencatat }}">{{ $fas->faskes_pencatat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="jenis_pemeriksan">Jenis Pemeriksaan</label>
                                        <input type="text" name="jenis_pemeriksan" class="form-control"
                                               id="jenis_pemeriksan" placeholder="Masukkan Jenis Pemeriksaan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal_kunjungan_pasien">Tanggal Kunjungan Pasien</label>
                                        <input type="date" name="tanggal_kunjungan_pasien" class="form-control"
                                               id="tanggal_kunjungan_pasien" placeholder="Masukkan Tanggal Kunjungan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal_pemeriksaan_lab">Tanggal Pemeriksaan Lab</label>
                                        <input type="date" name="tanggal_pemeriksaan_lab" class="form-control"
                                               id="tanggal_pemeriksaan_lab" placeholder="Masukkan Tanggal Pemeriksaan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="jenis_parasit">Jenis Parasit</label>
                                        <input type="text" name="jenis_parasit" class="form-control" id="jenis_parasit"
                                               placeholder="Masukkan Jenis Parasit" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="derajat_malaria">Derajat Malaria</label>
                                        <input type="text" name="derajat_malaria" class="form-control" id="derajat_malaria"
                                               placeholder="Masukkan Derajat Malaria" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="kekambuhan">Kekambuhan</label>
                                        <input type="text" name="kekambuhan" class="form-control" id="kekambuhan"
                                               placeholder="Masukkan Kekambuhan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal_gejala">Tanggal Gejala</label>
                                        <input type="date" name="tanggal_gejala" class="form-control"
                                               id="tanggal_gejala" placeholder="Masukkan Tanggal Gejala" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="gametosit">Gametosit</label>
                                        <input type="text" name="gametosit" class="form-control" id="gametosit"
                                               placeholder="Masukkan Gametosit" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="anemia">Anemia</label>
                                        <input type="text" name="anemia" class="form-control" id="anemia"
                                               placeholder="Masukkan Anemia" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="klasifikasi_khusus">Klasifikasi Khusus</label>
                                        <input type="text" name="klasifikasi_khusus" class="form-control" id="klasifikasi_khusus"
                                               placeholder="Masukkan Klasifikasi Khusus" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="tanggal_pengobatan">Tanggal Pengobatan</label>
                                        <input type="date" name="tanggal_pengobatan" class="form-control"
                                               id="tanggal_pengobatan" placeholder="Masukkan Tanggal Pengobatan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="DHP">DHP</label>
                                        <input type="text" name="DHP" class="form-control" id="DHP"
                                               placeholder="Masukkan DHP" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="primaquine">Primaquine</label>
                                        <input type="text" name="primaquine" class="form-control" id="primaquine"
                                               placeholder="Masukkan Primaquine" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="status_pengobatan">Status Pengobatan</label>
                                        <input type="text" name="status_pengobatan" class="form-control" id="status_pengobatan"
                                               placeholder="Masukkan Status Pengobatan" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="perawatan">Perawatan</label>
                                        <select type="text" name="perawatan" class="form-control" id="perawatan" required>
                                            <option value="rawat_inap">Rawat Inap</option>
                                            <option value="rawat_jalan">Rawat Jalan</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="kematian_dengan_malaria">Kematian Dengan Malaria</label>
                                        <input type="text" name="kematian_dengan_malaria" class="form-control" id="kematian_dengan_malaria"
                                               placeholder="Masukkan Kematian Dengan Malaria" required>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary"><i></i>Tambah Data</button>
                                <button type="reset" class="btn btn-danger">Set Ulang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        $(document).ready(function () {
            setTimeout(function () {
                $('.alert').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 8000); // Hilang dalam 2 detik
        });
    </script>
@stop
