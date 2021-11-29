<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('themes/templateproject/asset/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('themes/templateproject/asset/Style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Georama:wght@300&family=Lato:ital,wght@0,400;1,300&family=Oswald:wght@500&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/templateproject/asset/css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{ asset('themes/templateproject/asset/css/slick.css')}}">

    <title>Pamer Produk</title>
    <link rel="icon" href="{{ URL::asset('themes/templateproject/asset/image/pp logo 1.png') }}" type="image/x-icon">

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="{{ url('products') }}">
                <img src="{{ asset('themes/templateproject/asset/image/pp logo 1.png')}}" height="40px" width="40px" alt="">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <form class="form-inline my-2 my-lg-0 logo12" action="{{ url('products') }}" method="GET">
                    <input style="width: 500px;" class=" form-control mr-sm-2" type="search" placeholder="Cari Produk"
                        aria-label="Search" name="q" value="{{ isset($q) ? $q : null }}">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
                </form>


                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a style="color: white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Jurusan
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php
                            //Membuat koneksi ke database akademik
                            $kon = mysqli_connect("localhost",'root',"","taprakerin");
                            if (!$kon){
                                die("Koneksi database gagal:".mysqli_connect_error());
                            }
                                
                            //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                $sql="select * from categories";

                                $hasil=mysqli_query($kon,$sql);
                                $no=0;
                                while ($data = mysqli_fetch_array($hasil)) {
                                $no++;
                            ?>
                                <li> <a class="dropdown-item" href="#" value="<?php echo $data['id'];?>"><?php echo $data['name'];?></a></li>
                            <?php 
                                }
                            ?>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active dd" aria-current="page" href="#contact">Kontak Kami</a>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar Penutup -->


    <!-- Carousel -->
    <div class="container shadow carou p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="f-white"
                    style=" font-weight: bold; margin-bottom: 30px; padding: 20px;border-bottom: 1px solid white;">Promo
                    Produk
                </h1>
            </div>
            <div class="col-lg-12 mt-30">
                <div class="slide">
                    <img style="cursor:pointer; border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/PRODUK.jpg')}}" alt="">
                    <a href="#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/lemari1.jpg')}}"
                            alt=""></a>
                    <a href="#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/meja1.jpg')}}" alt=""></a>
                    <a href="#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/Sweater1.jpg')}}"
                            alt=""></a>
                    <a href="#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/Tote1.jpg ')}}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel Penutup -->


    <!-- Kategori -->
    <div class="container mt-50">
        <div class="row">
            <div class="col-12">
                <h1 class="f-bold">Kategori Karya</h1>
                <hr>
            </div>

                <div style="background-color:rgb(173, 155, 155);border-radius: 20px; padding: 5px;"
                    class="col-lg-5 shadow atas1">
                    <a class="jur" href="#">
                        <h1>Kayu</h1>
                    </a>
                </div>
                
                <div style="background-color: rgb(233, 113, 137); border-radius: 20px; padding: 5px;"
                    class="col-lg-5 shadow kiri">
                    <a class="jur" href="#">
                        <h1>Keramik</h1>
                    </a>
                </div>

                <div style="background-color:salmon;border-radius: 20px; padding: 5px;" class="col-lg-5 shadow atas1">
                    <a class="jur" href="#">
                        <h1>Tekstil</h1>
                    </a>
                </div>

                <div style="background-color: rgb(147, 236, 236); border-radius: 20px; padding: 5px;"
                    class="col-lg-5 shadow kiri">
                    <a class="jur" href="#">
                        <h1>Busana</h1>
                    </a>
                </div>

                <div style="background-color:yellow;border-radius: 20px; padding: 5px;" class="col-lg-5 shadow atas1">
                    <a class="jur" href="#">
                        <h1>Animasi</h1>
                    </a>
                </div>

                <div style="background-color: rgb(185, 146, 223); border-radius: 20px; padding: 5px;"
                    class="col-lg-5 shadow kiri">
                    <a class="jur" href="#">
                        <h1>Multimedia</h1>
                    </a>
                </div>

                <div style="background-color:rgb(140, 140, 255);border-radius: 20px; padding: 5px;"
                    class="col-lg-5 shadow atas1">
                    <a class="jur" href="#">
                        <h1>RPL</h1>
                    </a>
                </div>

                <div style="background-color: coral; border-radius: 20px; padding: 5px;" class="col-lg-5 shadow kiri">
                    <a class="jur" href="#">
                        <h1>TKJ</h1>
                    </a>
                </div>

        </div>
    </div>
    <!-- Penutup Kategori -->


    <!-- Judul -->
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="font-weight: bold; margin-top: 100px;">PRODUK SISWA-SISWI</h1>
                <hr class="mt-30">
            </div>
        </div>
    </div>
    <!-- Judul Penutup -->


    <!-- Card -->
    <div class="container mt-50">
        <div class="row">

            @forelse ($products as $produk)

            <div class="col-sm-12 col-md-6 col-lg-4 text-center mb-80">
                <div class="card shadow">
                    <div class="inner">
                        <a href="{{ url('products/'. $produk->slug) }}"><img style="border-radius: 60px;" class="img-fluid p-5"  width="98%"
                                src="{{ $produk->image}}" alt=""></a>
                    </div>
                    <div class="container">
                        <hr>
                    </div>
                    <a class="produk" href="{{ url('products/'. $produk->slug) }}">
                        <h2 class="">{{ Str::limit($produk->name ,10) }}</h2>
                    </a>
                    <p class="fs-18">{{ $produk->price}}</p>
                </div>
            </div>

                @empty
                    <tr>
                        <p>Mohon maaf produk tidak ada<p>
                    </tr>

            @endforelse

        </div>
    </div>
    <!-- Card Penutup -->


    <!-- Card 2 -->
    <div class="container bg1 mt-100 shadow-lg p-5">
        <div class="row">
            <div class="col-12">
                <h1 class="f-bold">REKOMENDASI PRODUK</h1>
                <hr class="mb-30">
            </div>
            <div class="col-sm-6 col-lg-6">
                <a href=#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/meja.jpg')}}"
                        width="100%" alt=""></a>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="#"><img style="border-radius: 10px;" class="img-fluid mb-20" src="{{ asset('themes/templateproject/asset/image/batik 24.jpg')}}"
                        width="100%" alt=""></a>
                <div class="row">
                    <div class="col-lg-6">
                        <a href="#"><img style="border-radius: 10px;" class="img-fluid" src="{{ asset('themes/templateproject/asset/image/totebag.jpg')}}"
                                width="100%" alt=""></a>
                    </div>
                    <div class="col-lg-6">
                        <a href="#"><img style="border-radius: 10px;" src="{{ asset('themes/templateproject/asset/image/sweater.jpg')}}" width="100%"
                                alt=""></a>
                    </div>
                    <div class="col-sm-6 col-lg-12">
                        <a href="#"><img style="border-radius: 10px;" class=" img-fluid" src="{{ asset('themes/templateproject/asset/image/vas.jpg')}}"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <a href="game.html"><img style="border-radius: 10px;" class="mb-30" src="{{ asset('themes/templateproject/asset/image/game bagas.jpeg')}}"
                        width="90%" alt=""></a>
                <div class="row">
                    <div class="col-12">
                        <a href="batik.html"><img style="border-radius: 10px;" src="{{ asset('themes/templateproject/asset/image/batik23.jpeg')}}" width="90%"
                                alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card 2 Penutup -->


    <!-- Card Khusus -->
    <div class="container mt-100">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="f-bold">ARTIKEL SEKOLAH</h1>
                <hr class="mb-50">
            </div>
            <div class="col-sm-12 col-lg-4 text-center mb-80">
                <div class="bg1 shadow inner p-5">
                    <a href="https://smkn5malang.sch.id/news/detail/artikel20210910014928"><img class="img-fluid mb-30"
                            src="{{ asset('themes/templateproject/asset/image/kn.jpeg')}}" alt=""></a>
                    <hr>
                    <a class="produk" href="https://smkn5malang.sch.id/news/detail/artikel20210910014928">
                        <h5 class="fs-18">Siswa SMK Negeri 5 Malang antusias menjalani vaksinasi</h5>
                    </a>
                </div>
                <div class="row mt-40">
                    <div class="col-sm-12 col-lg-12">
                        <div class="bg1 shadow p-5 inner">
                            <a href="https://smkn5malang.sch.id/news/detail/artikel20211006082927"><img
                                    class="img-fluid" src="{{ asset('themes/templateproject/asset/image/bbb.jpeg')}}" alt=""></a>
                            <hr class="mt-40">
                            <a class="produk" href="https://smkn5malang.sch.id/news/detail/artikel20211006082927">
                                <p class="fs-16">BKK SMKN 5 Malang berpartisipasi dalam acara Virtual Jobfair &
                                    Entrepeneur
                                    Expo 2021</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8 mb-80 text-center heh">
                <div class="bg1 shadow p-5">
                    <a href="https://smkn5malang.sch.id/news/detail/artikel20210917021812"><img class="img-fluid mt-20"
                            src="{{ asset('themes/templateproject/asset/image/sad.jpeg')}}" alt=""></a>
                    <hr class="mt-40">
                    <a class="produk" href="https://smkn5malang.sch.id/news/detail/artikel20210917021812">
                        <h5>Workshop Digital Marketing Strategy dan Social Media Marketing 13 sd 17 September
                            2021 di Hotel
                            Haris and Convention Surabaya</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Khusus Penutup -->


    <!-- Footer -->
    <div class="bg mt-100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-4 text-center mb-50">
                    <h3 id="contact" class="mb-20 f-white f-bold">Kontak Kami</h3>
                    <a href="https://web.whatsapp.com/"><img src="{{ asset('themes/templateproject/asset/image/whatsapp-logo-light-green-png-0.png')}}"
                            width="64px" alt=""><span class="ml-20 nom">081235468975</span></a>
                </div>
                <div class="col-sm-12 col-lg-4 text-center mb-50">
                    <a class="mr-30" href=""><img class="img-fluid" src="{{ asset('themes/templateproject/asset/image/pp logo 1.png')}}" width="64px" height="64px"
                            alt=""></a>
                    <a href="https://www.smkn5malang.sch.id/"><img class="img-fluid" src="{{ asset('themes/templateproject/asset/image/smk.gif')}}" width="25%"
                            alt=""></a>
                </div>
                <div class="col-sm-12 col-lg-4 text-center">
                    <h3 class="mb-20 f-white">Unduh Aplikasi Di</h3>
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 app">
                            <a href="https://play.google.com"><img class="mr-30" width="128px" src="{{ asset('themes/templateproject/asset/image/ps.svg')}}"
                                    alt=""></a>
                        </div>
                        <div class="col-sm-12 col-lg-6 ios">
                            <a href="https://www.apple.com"><img src="{{ asset('themes/templateproject/asset/image/ios.svg')}}" width="130px" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Penutup -->


</body>

</html>

<script src="{{ asset('themes/templateproject/asset/js/bootstrap.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<script src="{{ asset('themes/templateproject/asset/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('themes/templateproject/asset/js/slick.min.js')}}"></script>
<script src="{{ asset('themes/templateproject/asset/script.js')}}"></script>

<!-- <script>
    window.scrollTo({
        top: 100,
        bottom: 10,
        behavior: 'smooth',
    });
</script> -->