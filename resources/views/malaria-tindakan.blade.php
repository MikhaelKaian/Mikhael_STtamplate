@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Laporan Data Malaria</h1>
@stop

@section('js')
{{-- <div></div> --}}
@stop

@section('content')
<div class="card card-default mt-4">
    <div class="card-header">
        <h3 class="card-title">Data Tindakan</h3>
    </div>
    <div class="table-responsive card-body">
        <table id="table-data" class="table table-responsive table-striped table-borderer table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Faskes Pencatat</th>
                    <th>Jenis Pemeriksaan</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Jenis Parasit</th>
                    <th>Derajat Malaria</th>
                    <th>Kekambuhan</th>
                    <th>Tanggal Gejala</th>
                    <th>Gametosit</th>
                    <th>Anemia</th>
                    <th>Klasifikasi Khusus</th>
                    <th>Tanggal Pengobatan</th>
                    <th>DHP</th>
                    <th>Primaquine</th>
                    <th>Status Pengobatan</th>
                    <th>Perawatan</th>
                    <th>Kematian Dengan Malaria</th>
                    <th>Status Monitoring</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tindakans as $index => $tindakan)
                    <tr class="text-center">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tindakan->nama_pasien }}</td>
                        <td>{{ $tindakan->faskes_pencatat }}</td>
                        <td>{{ $tindakan->jenis_pemeriksan }}</td>
                        <td>{{ $tindakan->tanggal_kunjungan_pasien }}</td>
                        <td>{{ $tindakan->tanggal_pemeriksaan_lab }}</td>
                        <td>{{ $tindakan->jenis_parasit }}</td>
                        <td>{{ $tindakan->derajat_malaria }}</td>
                        <td>{{ $tindakan->kekambuhan }}</td>
                        <td>{{ $tindakan->tanggal_gejala }}</td>
                        <td>{{ $tindakan->gametosit }}</td>
                        <td>{{ $tindakan->anemia }}</td>
                        <td>{{ $tindakan->klasifikasi_khusus }}</td>
                        <td>{{ $tindakan->tanggal_pengobatan }}</td>
                        <td>{{ $tindakan->DHP }}</td>
                        <td>{{ $tindakan->primaquine }}</td>
                        <td>{{ $tindakan->status_pengobatan }}</td>
                        <td>{{ $tindakan->perawatan }}</td>
                        <td>{{ $tindakan->kematian_dengan_malaria }}</td>
                        <td>{{ $tindakan->status_monitoring }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Export Data</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('malaria.export-excel') }}" method="GET">
                <div class="form-group">
                    <label for="periode">Pilih Periode Waktu</label>
                    <select name="periode" id="periode" class="form-control">
                        <option value="1">1 Bulan</option>
                        <option value="2">2 Bulan</option>
                        <option value="3">3 Bulan</option>
                        <option value="6">6 Bulan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Export</button>
            </form>
        </div>
    </div>
@stop