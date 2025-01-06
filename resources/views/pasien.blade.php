@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
    <h1>Data Pasien Terjangkit
@stop

@section('js')
{{-- <div></div> --}}
@stop

@section('content')

<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">{{'Tambah Data Pasien'}}</div>
        <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahPasienModal"><i class="fa fa-plus"></i>Tambah Data</button>
            <hr/>
            </div>
            <table id="table-data" class="table table-borderer">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>NAMA PASIEN</th>
                        <th>USIA</th>
                        <th>JENIS KELAMIN</th>
                        <th>BERAT BADAN</th>
                        <th>PEKERJAAN</th>
                        <th>ALAMAT</th>
                        <th>NOMOR TELEPON</th>
                        <th>KECAMATAN DOMISILI</th>

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
                            <td>{{$pasien->no_telepon_pasien}}</td>
                            <td>{{$pasien->kecamatan_domisili}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahPasienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pasien Terjangkit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pasien.submit') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required/>
                        </div>
                        <div class="form-group">
                            <label for="usia">Usia</label>
                            <input type="text" class="form-control" name="usia" id="usia" required/>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                                <option value="laki-laki"> Laki-Laki</option>
                                <option value="perempuan"> Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berat_badan">Berat Badan</label>
                            <input type="text" class="form-control" name="berat_badan" id="berat_badan" required/>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required/>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required/>
                        </div>
                        <div class="form-group">
                            <label for="no_telepon_pasien">Nomor Telepon</label>
                            <input type="text" class="form-control" name="no_telepon_pasien" id="no_telepon_pasien" required/>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan_domisili">Kecamatan Domisili</label>
                            <input type="text" class="form-control" name="kecamatan_domisili" id="kecamatan_domisili" required/>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
