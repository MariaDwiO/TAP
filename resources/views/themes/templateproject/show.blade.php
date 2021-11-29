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
                
                <form class="form-inline my-2 my-lg-0 logo12">
                    <input style="width: 500px;" class=" form-control mr-sm-2" type="search" placeholder="Cari Produk"
                        aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
                </form>
                
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li>
                        <a href="{{ url('products') }}">
                            <svg class="logo1" xmlns="http://www.w3.org/2000/svg" width="25"
                                height="25" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                            </svg>
                        </a>
                    </li>

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

    <!-- Card -->
    <div class="container atas">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6 p-5 meja">
                            <div class="inne">
                                <h3 class="text-center f-bold rapi">Nama Barang : {{ $products->name }}</h3>
                                <hr>
                                <img class="img-fluid " src="{{ asset('storage/' .$products->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 p-5 meja brd">
                            <h3 class="f-bold">Harga : {{ $products->price }}</h3>
                            <hr>
                            <p>Nama Pembuat : {{ $products->name_siswa }}</p>
                            <p>Jurusan : Keramik</p>
                            <p>Lama Pengerjaan : {{ $products->pengerjaan }}</p>
                            <hr>
                            <p class="f-bold">Deskripsi : <p>{!! $products->description !!}</p>
                            </p>

                            <a href="{{ url('products') }}">
                                <p class="fs-18 back"><svg xmlns="http://www.w3.org/2000/svg" width="32px" height="32px"
                                    fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z" />
                                </svg>Kembali</p>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
