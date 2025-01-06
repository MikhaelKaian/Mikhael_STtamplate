@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Laporan Data Malaria
@stop

@section('js')
{{-- <div></div> --}}
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header"></div>
            <table id="table-data" class="table table-borderer table-hover">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA PASIEN</th>
                        <th>USIA</th>
                        <th>JENIS KELAMIN</th>
                        <th>BERAT BADAN</th>
                        <th>PEKERJAAN</th>
                        <th>ALAMAT</th>
                        <th>FASKES PENCATAT</th>
                        <th>FASKES DOMISILI</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                    @foreach ($pasiens as $pasien)
                        <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td>{{$pasien->nama_pasien}}</td>
                            <td>{{$pasien->usia}}</td>
                            <td>{{$pasien->jenis_kelamin}}</td>
                            <td>{{$pasien->berat_badan}}</td>
                            <td>{{$pasien->pekerjaan}}</td>
                            <td>{{$pasien->alamat}}</td>
                      
                    @endforeach
                    @php $no=1; @endphp
                    @foreach($faskes as $f)
                    
                    <td>{{$f->faskes_pencatat}}</td>
                    <td>{{$f->faskes_domisili}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop