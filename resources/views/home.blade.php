@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6 grid-margin ">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-check2-circle mt-3 mb-2" viewBox="0 0 16 16">
                                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                            </svg>
                                            <div class="title">
                                                @if($user->roles_id == 1)
                                                    Anda Login Sebagai Admin
                                                @elseif($user->roles_id == 2)
                                                    Selamat Datang <h4 class="font-weight-bold">{{$user->name}}</h4>
                                                @elseif($user->roles_id == 3)
                                                Selamat Datang <h4 class="font-weight-bold">{{$user->name}}</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 grid-margin ">
                            <div class="card">
                                <div class="card-body bg-dark">
                                    <div class="col-sm-12">
                                        <div class="statistics-details d-flex align-items-center justify-content-between">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                                            </svg>
                                            {{-- <div class="title">
                                                <h5>Jumlah Pasien</h5>
                                                <h3 class="font-weight-bold text-right">{{$jumlahpasien}}</h3>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@stop

@section('js')

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })

    @if(Session::has('message'))
        var type = "{{Session::get('alert-type')}}";
        switch (type){
            case 'info':
                Toast.fire({
                    icon: 'info',
                    title: "{{ Session::get('message') }}"
                })
                break;
                case 'success':
                Toast.fire({
                    icon: 'success',
                    title: "{{ Session::get('message') }}"
                })
                break;
                case 'error':
                Toast.fire({
                    icon: 'error',
                    title: "{{ Session::get('message') }}"
                })
                break;
                case 'info':
                Toast.fire({
                    icon: 'info',
                    title: "Ooops",
                    text: "{{ Session::get('message') }}"
                })
                break;
        }
    @endif

    @if ($errors->any())
    @foreach($errors->all() as $errors)
        Swal.fire({
            type: 'error',
            title: "Ooops",
            text: "{{ $errors }}",
        })
        @endforeach
    @endif

    $('#table-data').DataTable();

    let baseurl = "<?=url("/")?>";
    let fullURL = "<?=url()->full()?>";
</script>
@stop