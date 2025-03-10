@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Laporan Data Malaria</h1>
@stop

@section('js')
{{-- <div></div> --}}
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Data Pasien Terjangkit</h3>
        </div>
        <div class="card-body">
            <table id="table-data" class="table table-striped table-borderer table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA PASIEN Terjangkit</th>
                        <th>USIA</th>
                        <th>JENIS KELAMIN</th>
                        <th>BERAT BADAN</th>
                        <th>PEKERJAAN</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $index => $pasien)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pasien->nama_pasien }}</td>
                            <td>{{ $pasien->usia }}</td>
                            <td>{{ $pasien->jenis_kelamin }}</td>
                            <td>{{ $pasien->berat_badan }}</td>
                            <td>{{ $pasien->pekerjaan }}</td>
                            <td>{{ $pasien->alamat }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop