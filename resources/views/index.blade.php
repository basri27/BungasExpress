<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Bungas Express | Jasa Pengiriman Barang Banjarmasin, Anjir, dan Kapuas</title>

    <link rel="icon" href="{{ asset('/images/with_text.png') }}">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link href="{{ asset('/css/core.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/templatemo-topic-listing.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet"> --}}


    {{-- TemplateMo 590 topic listing (https://templatemo.com/tm-590-topic-listing) --}}
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg bg-danger">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('images/with_text.png') }}">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">Cara Menggunakan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_3">Kontak</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Masuk/Daftar</a>
                            </li>
                        @endguest
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        @endauth

                    </ul>
                </div>

            </div>
        </nav>

        <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 mx-auto">
                        <h1 class="text-white text-center">Bungas Express</h1>

                        <h6 class="text-center">Jasa pengiriman barang area Banjarmasin-Anjir-Kapuas</h6>

                        <form action="javascript:void(0)" id="form-search" method="post"
                            class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1"></span>

                                <input name="resi" type="search" class="form-control" id="resi"
                                    placeholder="No. Resi" aria-label="Search">

                                <button type="submit" class="form-control">Cari</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <section class="featured-section">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block bg-white shadow-lg">
                            <div id="loading" style="display: none">
                                <p class="text-secondary text-center">Tunggu sebentar...</p>
                                <div class="progress">
                                    <div id="loading-bar" class="progress-bar bg-success" role="progressbar"
                                        style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">0%
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div id="detailBarang">
                                    <center>
                                        <p class="text-secondary m-4" id="no-data">No data...</p>
                                    </center>
                                    <div id="data-barang" style="display: none">
                                        <h5 class="mb-2">Detail Paket</h5>

                                        <h6 class="mb-0" id="no-resi"></h6>
                                        <p class="copyright-text" id="pemilik"></p>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">
                                            Lacak Paket
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="timeline-section section-padding" id="section_2">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Bagaimana caranya?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Cari barang Anda</h4>

                                    <p class="text-white">Anda dapat melakukan pengecekan lokasi barang Anda dengan
                                        memasukkan nomor resi pada kolom pencarian. Kemudian sistem akan mencari data
                                        barang Anda
                                        dan menampilkannya.
                                    </p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Cek &amp; Kenali</h4>

                                    <p class="text-white">Setelah data barang Anda ditemukan, Anda dapat mengecek dan
                                        melihat informasi mengenai barang Anda seperti nomor resi, pemilik barang, serta
                                        lokasi barang Anda.</p>

                                    <div class="icon-holder">
                                        <i class="bi-bag-check"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Puas &amp; Tidak Penasaran</h4>

                                    <p class="text-white">Anda pun dapat melihat riwayat lokasi barang Anda, sehingga
                                        Anda tidak perlu bertanya-tanya dimana lokasi barang Anda.</p>

                                    <div class="icon-holder">
                                        <i class="bi-emoji-smile"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="contact-section section-padding section-bg" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-5">Temukan Kami</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        {{-- <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.3206504167183!2d114.4019379!3d-3.0081555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de46ff52d91fea5%3A0x4fb183b1c92572e4!2sOlshop%20bungas%20dan%20bungas%20express%20kapuas!5e0!3m2!1sid!2sid!4v1717149920506!5m2!1sid!2sid"
                            width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                        <h4 class="mb-3">Bungas Express Kuala Kapuas</h4>

                        <p>Jl. Cilik Riwut No.07, Selat Tengah, Kec. Selat, Kabupaten Kapuas, Kalimantan Tengah 73581
                        </p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">WhatsApp</span>

                            <a href="tel: 305-240-9671" class="site-footer-link">
                                &nbsp;089655680487
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mx-auto">
                        <h4 class="mb-3">Bungas Express Banjarmasin</h4>

                        <p>Jl. Hikmah Banua, Pemurus Luar, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan
                            70236</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">WhatsApp</span>

                            <a href="tel: 110-220-3400" class="site-footer-link">
                                &nbsp;089655680487
                            </a>
                        </p>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
                        <i class="bi-back"></i>
                        <span>Bungas<br>Express</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">

                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">

                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">

                    <p class="copyright-text mt-lg-5 mt-4">Copyright © 2024 Bungas Express. All rights reserved.
                        <br><br>Design: <a rel="nofollow" href="https://templatemo.com"
                            target="_blank">TemplateMo</a>
                    </p>

                </div>

            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi Barang</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <section class="timeline_area section_padding_130">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <!-- Section Heading-->
                                    <div class="section_heading text-center">
                                        <h6>Lokasi Barang</h6>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Timeline Area-->
                                    <div class="apland-timeline-area" id="riwayat-lokasi">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/js/date.format.js') }}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#form-search').validate({
            submitHandler: function() {
                var resi = $('#resi').val();
                var detail = document.getElementById('data-barang');
                var no_resi = document.getElementById('no-resi');
                var pemilik = document.getElementById('pemilik');
                var noData = document.getElementById('no-data');
                var loading = document.getElementById('loading');
                var loadingBar = document.getElementById('loading-bar');

                if (resi == null || resi == "") {
                    noData.innerHTML = "Anda harus mengisi nomor resi terlebih dahulu";
                    noData.style.display = 'block';
                    detail.style.display = 'none';
                } else {
                    detail.style.display = 'none';
                    noData.style.display = 'none';
                    loading.style.display = 'block';
                    loadingBar.style.width = '0%';
                    loadingBar.innerHTML = '0%';
                    setTimeout(() => {
                        loadingBar.style.width = '25%';
                        loadingBar.innerHTML = '25%';
                    }, 500);
                    setTimeout(() => {
                        loadingBar.style.width = '50%';
                        loadingBar.innerHTML = '50%';
                    }, 1000);
                    setTimeout(() => {
                        loadingBar.style.width = '75%';
                        loadingBar.innerHTML = '75%';
                    }, 1250);
                    setTimeout(() => {
                        loadingBar.style.width = '100%';
                        loadingBar.innerHTML = '100%';
                    }, 1500);
                    setTimeout(() => {
                        $.ajax({
                            url: "{{ route('searchBarang') }}",
                            type: 'POST',
                            dataType: "json",
                            data: {
                                resi: resi
                            },
                            success: function(data) {
                                let values = Object.values(data);


                                loading.style.display = 'none';
                                detail.style.display = 'block';
                                no_resi.innerHTML = 'No. Resi: ' + values[0]['no_resi'];
                                pemilik.innerHTML = 'Pemilik: ' + values[0]['user']['nama'];
                                $('#riwayat-lokasi').empty();

                                let lokasi = values[0]['lokasi'];
                                if (lokasi.length > 0) {
                                    let data_lokasi = Object.keys(lokasi);
                                    data_lokasi.forEach(key => {
                                        let date = new Date(lokasi[key][
                                            'created_at'
                                        ]);
                                        dateFormat.masks.hammerTime = 'HH:MM:ss';

                                        $('#riwayat-lokasi').append(
                                            '<div class="single-timeline-area"><div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;"><p>' +
                                            dateFormat(date, "dd mmm yyyy") +
                                            '<br>' +
                                            date.format("hammerTime") +
                                            '</p></div><div class="row"><div class="col-12 col-md-6 col-lg-12"><div class="single-timeline-content d-flex wow fadeInLeft" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;"><div class="timeline-text"><p id="posisi">' +
                                            lokasi[key]['posisi'] +
                                            '</p></div></div></div></div></div>'
                                        );
                                    });
                                } else {
                                    $('#riwayat-lokasi').append(
                                        '<hr><p class="text-center">Lokasi barang belum diperbaharui oleh Admin!</p><hr>'
                                    )
                                }
                            }
                        })
                    }, 2000);
                }
            }
        });
    </script>
</body>

</html>
