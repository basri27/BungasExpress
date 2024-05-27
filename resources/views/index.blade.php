<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bungas Express | Jasa Pengiriman Barang Banjarmasin, Anjir, dan Kapuas</title>

    <link rel="icon" href="{{ asset('/images/with_text.png') }}">

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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

                        <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1">

                                </span>

                                <input name="resi" type="search" class="form-control" id="keyword"
                                    placeholder="No. Resi" aria-label="Search">

                                <button id="loading-button" type="submit" class="form-control">Cari</button>
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
                            <div class="d-flex">
                                <div>
                                    <h5 class="mb-2">Detail Paket</h5>

                                    <h6 class="mb-0">No. Resi: JP5106647459</h6>
                                    <p class="copyright-text">Pemilik: M. Basri</p>
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
        </section>

        <section class="timeline-section section-padding" id="section_2">
            <div class="section-overlay"></div>

            <div class="container">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">How does it work?</h1>
                    </div>

                    <div class="col-lg-10 col-12 mx-auto">
                        <div class="timeline-container">
                            <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                <div class="list-progress">
                                    <div class="inner"></div>
                                </div>

                                <li>
                                    <h4 class="text-white mb-3">Search your favourite topic</h4>

                                    <p class="text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Reiciendis, cumque magnam? Sequi, cupiditate quibusdam alias illum sed esse ad
                                        dignissimos libero sunt, quisquam numquam aliquam? Voluptas, accusamus omnis?
                                    </p>

                                    <div class="icon-holder">
                                        <i class="bi-search"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Bookmark &amp; Keep it for yourself</h4>

                                    <p class="text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                        Sint animi necessitatibus aperiam repudiandae nam omnis est vel quo, nihil
                                        repellat quia velit error modi earum similique odit labore. Doloremque,
                                        repudiandae?</p>

                                    <div class="icon-holder">
                                        <i class="bi-bookmark"></i>
                                    </div>
                                </li>

                                <li>
                                    <h4 class="text-white mb-3">Read &amp; Enjoy</h4>

                                    <p class="text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                        Animi vero quisquam, rem assumenda similique voluptas distinctio, iste est hic
                                        eveniet debitis ut ducimus beatae id? Quam culpa deleniti officiis autem?</p>

                                    <div class="icon-holder">
                                        <i class="bi-book"></i>
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
                        <h2 class="mb-5">Get in touch</h2>
                    </div>

                    <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                        {{-- <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.065641062665!2d-122.4230416990949!3d37.80335401520422!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80858127459fabad%3A0x808ba520e5e9edb7!2sFrancisco%20Park!5e1!3m2!1sen!2sth!4v1684340239744!5m2!1sen!2sth"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d342.1462138727321!2d114.39847688407147!3d-2.9946827223148773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1713947035317!5m2!1sid!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-3 mb-lg- mb-md-0 ms-auto">
                        <h4 class="mb-3">Head office</h4>

                        <p>Bay St &amp;, Larkin St, San Francisco, CA 94109, United States</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 305-240-9671" class="site-footer-link">
                                305-240-9671
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:info@company.com" class="site-footer-link">
                                info@company.com
                            </a>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mx-auto">
                        <h4 class="mb-3">Dubai office</h4>

                        <p>Burj Park, Downtown Dubai, United Arab Emirates</p>

                        <hr>

                        <p class="d-flex align-items-center mb-1">
                            <span class="me-2">Phone</span>

                            <a href="tel: 110-220-3400" class="site-footer-link">
                                110-220-3400
                            </a>
                        </p>

                        <p class="d-flex align-items-center">
                            <span class="me-2">Email</span>

                            <a href="mailto:info@company.com" class="site-footer-link">
                                info@company.com
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
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <section class="timeline_area section_padding_130">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <!-- Section Heading-->
                                    <div class="section_heading text-center">
                                        <h6>Our History</h6>
                                        <h3>A brief stories of our 2 years company journey</h3>
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <!-- Timeline Area-->
                                    <div class="apland-timeline-area">
                                        <!-- Single Timeline Content-->
                                        <div class="single-timeline-area">
                                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s"
                                                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                                <p>Near Future</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-12">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft"
                                                        data-wow-delay="0.3s"
                                                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-icon"><i class="fa-solid fa-car-side"
                                                                aria-hidden="true"></i></div>
                                                        <div class="timeline-text">
                                                            <h6>Updated 5.0</h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Timeline Content-->
                                        <div class="single-timeline-area">
                                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s"
                                                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                                <p>2020</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft"
                                                        data-wow-delay="0.3s"
                                                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-icon"><i class="fa fa-briefcase"
                                                                aria-hidden="true"></i></div>
                                                        <div class="timeline-text">
                                                            <h6>Updated 4.4.0</h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Single Timeline Content-->
                                        <div class="single-timeline-area">
                                            <div class="timeline-date wow fadeInLeft" data-wow-delay="0.1s"
                                                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInLeft;">
                                                <p>2019</p>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="single-timeline-content d-flex wow fadeInLeft"
                                                        data-wow-delay="0.3s"
                                                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                                        <div class="timeline-icon"><i class="fa fa-id-card"
                                                                aria-hidden="true"></i></div>
                                                        <div class="timeline-text">
                                                            <h6>Updated 4.0</h6>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Recent Activity -->
                    {{-- <div class="card">

                        <div class="card-body">

                            <div class="activity">

                                <div class="activity-item d-flex">
                                    <div class="activite-label">32 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo
                                            officiis</a> beatae
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">56 min</div>
                                    <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptatem blanditiis blanditiis eveniet
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 hrs</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        Voluptates corrupti molestias voluptatem
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">1 day</div>
                                    <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                    <div class="activity-content">
                                        Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati
                                            voluptatem</a> tempore
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">2 days</div>
                                    <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                    <div class="activity-content">
                                        Est sit eum reiciendis exercitationem
                                    </div>
                                </div><!-- End activity item-->

                                <div class="activity-item d-flex">
                                    <div class="activite-label">4 weeks</div>
                                    <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                    <div class="activity-content">
                                        Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                    </div>
                                </div><!-- End activity item-->

                            </div>

                        </div>
                    </div><!-- End Recent Activity --> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('js/click-scroll.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>



    <script type="text/javascript">
        const button = document.getElementById("loading-button");

        button.addEventListener("click", () => {

            // Disable the button to prevent multiple clicks
            button.disabled = true;

            // Add the loading animation CSS class

            button.classList.add("button-loader");

            // Simulate an asynchronous task (replace this with your actual task)

            setTimeout(() => {
                button.disabled = false;

                // Remove the loading animation CSS class
                button.classList.remove("button-loader");
            }, 2000);
        });
    </script>
</body>

</html>
