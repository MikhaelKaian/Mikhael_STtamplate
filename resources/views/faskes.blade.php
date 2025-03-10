@extends('adminlte::page')

@section('title', 'Home Page')

@section('content_header')
<h1 class="m-0 text-dark">Data Faskes</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card card-default">
    <div class="card-header">{{__('Pengelolaan Buku')}}</div>
        <div class="card-body">
            <div class="w-100 d-flex justify-content-between" style="margin-right: 10px">
                <div class="tombol">
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i>Tambah Data</button>
                </div>
            </div>
            <hr>
            <table id="table-data" class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>NO</th>
                        <th>FASKES PENCATAT</th>
                        <th>JENSI FASKES</th>
                        <th>FASKES DOMISILI</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($faskes as $f)
                        <tr class="text-center">
                            <td>{{$no++}}</td>
                            <td>{{$f->faskes_pencatat}}</td>
                            <td>{{$f->jenis_faskes}}</td>
                            <td>{{$f->faskes_domisili}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" id="btn-edit-faskes" class="btn btn-success" data-toggle="modal" data-target="#editBukuModal" data-id="{{ $f->id }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btnHapus" data-id="{{ $f->id }}"><i class="bi bi-trash"></i>  Hapus</button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <table id="table-data" class="table table-bordered">
                <thead>
                    <div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class= "modal-title" id="exampleModalLabel">Tambah Data Faskes</5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="{{ route('faskes')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="faskes_pencatat">Faskes Pencatat</label>
                                            <input type="text"class="form-control" name="faskes_pencatat" id="faskes_pencatat" required/>
                                        </div>
                                        <div class="form-group">
                                        <label for="jenis_faskes">Jenis Faskes</label>
                                            <input type="text"class="form-control" name="jenis_faskes" id="jenis_faskes" required/>
                                        </div>
                                        <div class="form-group">
                                        <label for="faskes_domisili">Faskes Domisili</label>
                                            <input type="text"class="form-control" name="faskes_domisili" id="faskes_domisili" required/>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="editBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Faskes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('faskes') }}" enctype="multipart/form-data">
                    @csrf
                    @method ('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-faskes_pencatat">Faskes Pencatat</label>
                                <input type="text"class="form-control" name="faskes_pencatat" id="edit-faskes_pencatat" required/>
                            </div>
                            <div class="form-group">
                            <label for="edit-jenis_faskes">Jenis Faskes</label>
                                <input type="text"class="form-control" name="jenis_faskes" id="edit-jenis_faskes" required/>
                            </div>
                            <div class="form-group">
                            <label for="edit-faskes_domisili">Faskes Domisili</label>
                                <input type="text"class="form-control" name="faskes_domisili" id="edit-faskes_domisili" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="edit-id"/>
                    <input type="hidden" name="old_cover" id="edit-old-cover"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
    <script>
        $(function(){
            $(document).on('click','#btn-edit-faskes', function(){

                let id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: "{{url('/admin/ajaxadmin/dataBuku')}}/"+id,
                    dataType: 'json',
                    success: function(res){
                        $('#edit-faskes_pencatat').val(res.faskes_pencatat);
                        $('#edit-jenis_faskes').val(res.jenis_faskes);
                        $('#edit-faskes_domisili').val(res.faskes_domisili);
                        $('#edit-id').val(res.id);
                    },
                });
            });
        });
    //     $(document).ready(function () {
    //     @if (session('alert-type'))
    //         Swal.fire({
    //             icon: "{{ session('alert-type') }}",
    //             title: "{{ session('message') }}",
    //             showConfirmButton: false,
    //             timer: 3000
    //         });
    //     @endif
    // });
    $(document).ready(function() {
    setTimeout(function() {
            $('.alert').fadeOut("slow");
        }, 2000);

        $('.btnHapus').each(function() {
            $(this).on('click', function() {
                var id = $(this).data('id');
                var url = "{{ url('faskes/delete') }}/"+id+"";

                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah anda yakin ingin menghapus data?',
                    showDenyButton: true,
                    confirmButtonText: 'Hapus',
                    denyButtonText: `Batal`,
                    icon: 'warning',
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = url;
                    } else if (result.isDenied) {
                        Swal.fire('Data batal dihapus', '', 'error')
                    }
                })
            })
        })
    })
    </script>
@stop