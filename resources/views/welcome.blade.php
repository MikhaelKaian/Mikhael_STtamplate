<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Monitoring Malaria</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="welcome">Dinas Kesehatan</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item mx-0 mx-lg-1">
                                    <a href="{{ url('/home') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Home</a>
                                </li>
                        @else
                            <li class="nav-item mx-0 mx-lg-1">
                                <a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Log in</a>
                            </li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Masthead-->
        <header class="masthead bg-light text-black text-center">
            <div class="container">
                <!-- Masthead Avatar Image-->
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Monitoring Malaria</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-black">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Dinas Kesehatan Cianjur - Cianjur </p>
            </div>
            <div class="container align-items-center text-center">
                <img class="masthead-avatar " src="/vendor/adminlte/dist/img/OIP.jpg" alt="..." />

                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-black">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-black">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg"><p class="text-center">Makna gambar dan warna pada lambang Cianjur ialah Perisai yang melambangkan ketangguhan fisik dan mental. Selanjutnya, Warna dasar kuning emas, melambangkan kehidupan yang abadi dan Gunung berwarna hijau, melambangkan kesuburan. Hamparan warna biru, menunjukkan air yang melambangkan kesetiaan dan ketaatan. Sedangkan dua tangkai padi bersilang berwarna, masing - masing berbutir 17 melambangkan ketentraman dan dinamika kehidupan masyarakat yang dijiwai semangat Proklamasi Kemerdekaan RI 17 Agustus 1945. Simpul pita berwarna kuning emas, melambangkan sifat persatuan dan kesatuan. Terakhir tulisanSugihMukti pada pita yang juga menjadi motto dari Cianjur, melambangkan kesejahteraan.</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-info" href="https://cianjurkab.go.id/">
                        Informasi Lanjut
                    </a>
                </div>
            </div>
        </header>
      
        <section class="page-section bg-white text-black mb-0" id="about">
           
        </section>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="text-center">
                        <h4 class="text-uppercase mb-4">Lokasi</h4>
                        <p class="lead mb-0">
                            Jalan Prof.Moh.Yamin No.8 Cianjur 43214. (0263) 268894. 
                            <br />
                            Kecamatan, Cianjur, Kabupaten Cianjur
                        </p>
                    </div>
                    <!-- Footer About Text-->
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('vendor/sweetalert2/sweetalert2.min.js') }}"></script>
    </body>
</html>