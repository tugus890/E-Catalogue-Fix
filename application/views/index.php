<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Tivo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" style="text-decoration: none;" href=""><img src="<?= base_url('assets/') ?>t_2/images/pnbori.png" alt="E-Catalogue">E-Catalogue PNB</a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#produk">PRODUCT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#features">FEATURES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#video">VIDEO</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#testimoni">TESTIMONI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullscreenModal">FAQ</a>
                </li>
            </ul>



            <span class="nav-item">
                <a class="btn-outline-sm" href="<?= base_url('Cauth') ?>">LOG IN</a>
            </span>
        </div>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->

<!-- Header -->
<header id="header" class="header">
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-5">
                    <div class="text-container">
                        <h1 style="font-family:Georgia;">E-Catalogue & Sewa</h1>
                        <p class="p-large" style="font-family:Poppins;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis.</p>
                        <a class="btn-solid-lg page-scroll" href="<?= base_url('Cauth') ?>">SIGN UP</a>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6 col-xl-7">
                    <div class="image-container">
                        <div class="img-wrapper">
                            <img class="img-fluid" style="border-radius: 1rem;" src="<?= base_url('assets/') ?>images/pnb.jpg" alt="alternative">
                        </div> <!-- end of img-wrapper -->
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of header-content -->
</header> <!-- end of header -->
<svg class="header-frame" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 310">
    <defs>
        <style>
            .cls-1 {
                fill: #5f4def;
            }
        </style>
    </defs>
    <title>header-frame</title>
    <path class="cls-1" d="M0,283.054c22.75,12.98,53.1,15.2,70.635,14.808,92.115-2.077,238.3-79.9,354.895-79.938,59.97-.019,106.17,18.059,141.58,34,47.778,21.511,47.778,21.511,90,38.938,28.418,11.731,85.344,26.169,152.992,17.971,68.127-8.255,115.933-34.963,166.492-67.393,37.467-24.032,148.6-112.008,171.753-127.963,27.951-19.26,87.771-81.155,180.71-89.341,72.016-6.343,105.479,12.388,157.434,35.467,69.73,30.976,168.93,92.28,256.514,89.405,100.992-3.315,140.276-41.7,177-64.9V0.24H0V283.054Z" />
</svg>
<!-- end of header -->


<!-- Slider -->
<div class="slider-1">
    <div class="container">
        <div class="row">

            <div id="carouselExampleIndicators" class="carousel slide" style="">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img style="border-radius: 1rem;" src="<?= base_url('assets/') ?>images/kolam 1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="border-radius: 1rem;" src="<?= base_url('assets/') ?>images/voli 1.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img style="border-radius: 1rem;" src="<?= base_url('assets/') ?>images/basket 1.png" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of slider-1 -->
<!-- end of slider -->


<!-- Product -->
<div id="produk" class="cards-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">Product</div>
                <h2 class="h2-heading">Our Product</h2>
            </div>
        </div> <!-- end of row -->
        <div class="row mb-1">
            <?php foreach ($produk as $item) : ?>
                <div class="col-md-3 col-lg-3 mb-2">
                    <div class="card">
                        <img class="card-img-top" height="200px" src="<?= file_exists('assets/upload/' . $item->foto_produk1)  ? base_url() . 'assets/upload/' . $item->foto_produk1 : 'https://dinkes.dairikab.go.id/wp-content/uploads/sites/12/2022/03/default-img.gif' ?>">
                        <div class="card-body m-2">
                            <h5 class="card-title text-left m-1"><?= $item->nama_produk ?></h5>
                            <p class="card-text text-left m-1"><?= $item->deskripsi_produk ?></p>
                            <div class="d-flex justify-content-between">
                                <p class="card-text text-left m-1">Rp. <?= number_format($item->harga_lunas) ?></p>
                                <a href="<?= base_url() . 'user/product/detail/' . $item->id_produk ?>" class="btn btn-outline-primary btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of product -->


<!-- Features -->
<div id="features" class="tabs">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">FEATURES</div>
                <h2 class="h2-heading">Main Features E-Catalogue</h2>
                <p class="p-heading">Membantu penyewaan unit yang berada di dalam lingkungan Politeknik Negeri Bali</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Tabs Links -->
                <ul class="nav nav-tabs" id="argoTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true"><i class="fas fa-list"></i>Pilihan Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false"><i class="fas fa-chart-bar"></i>FAQ</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"><i class="fas fa-envelope-open-text"></i>Penyewaan</a>
                    </li>
                </ul>
                <!-- end of tabs links -->

                <!-- Tabs Content -->
                <div class="tab-content" id="argoTabsContent">

                    <!-- Tab -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-container">
                                    <img class="img-fluid" src="images/features-1.png" alt="alternative">
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <h3>List Building Is Easier Than Ever</h3>
                                    <p>It's very easy to start using Tivo. You just need to fill out and submit the <a class="blue page-scroll" href="sign-up.html">Sign Up Form</a> and you will receive access to the app and all of its features in no more than 24h.</p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Create and embed on websites newsletter sign up forms</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Manage forms and landing pages for your services</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Add and remove subscribers using the control panel</div>
                                        </li>
                                    </ul>
                                    <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-1">LIGHTBOX</a>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-container">
                                    <img class="img-fluid" src="images/features-2.png" alt="alternative">
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <h3>Campaigns Monitoring Tools</h3>
                                    <p>Campaigns monitoring is a feature we've developed since the beginning because it's at the core of Tivo and basically to any marketing activity focused on results.</p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Easily plan campaigns and schedule their starting date</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Start campaigns and follow their evolution closely</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Evaluate campaign results and optimize future actions</div>
                                        </li>
                                    </ul>
                                    <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-2">LIGHTBOX</a>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                    <!-- Tab -->
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image-container">
                                    <img class="img-fluid" src="images/features-3.png" alt="alternative">
                                </div> <!-- end of image-container -->
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="text-container">
                                    <h3>Analytics Control Panel</h3>
                                    <p>Analytics control panel is important for every marketing team so it's beed implemented from the begging and designed to produce reports based on very little input information.</p>
                                    <ul class="list-unstyled li-space-lg">
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">If you set it up correctly you will get acces to great intel</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">Easy to integrate in your websites and landing pages</div>
                                        </li>
                                        <li class="media">
                                            <i class="fas fa-square"></i>
                                            <div class="media-body">The generated reports are important for your strategy</div>
                                        </li>
                                    </ul>
                                    <a class="btn-solid-reg popup-with-move-anim" href="#details-lightbox-3">LIGHTBOX</a>
                                </div> <!-- end of text-container -->
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                    </div> <!-- end of tab-pane -->
                    <!-- end of tab -->

                </div> <!-- end of tab content -->
                <!-- end of tabs content -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of tabs -->
<!-- end of features -->


<!-- Details Lightboxes -->
<!-- Details Lightbox 1 -->
<div id="details-lightbox-1" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>List Building</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 1 -->

<!-- Details Lightbox 2 -->
<div id="details-lightbox-2" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>Campaign Monitoring</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 2 -->

<!-- Details Lightbox 3 -->
<div id="details-lightbox-3" class="lightbox-basic zoom-anim-dialog mfp-hide">
    <div class="container">
        <div class="row">
            <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
            <div class="col-lg-8">
                <div class="image-container">
                    <img class="img-fluid" src="images/details-lightbox.png" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-4">
                <h3>Analytics Tools</h3>
                <hr>
                <h5>Core service</h5>
                <p>It's very easy to start using Tivo. You just need to fill out and submit the Sign Up Form and you will receive access to the app.</p>
                <ul class="list-unstyled li-space-lg">
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">List building framework</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Easy database browsing</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">User administration</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Automate user signup</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Quick formatting tools</div>
                    </li>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body">Fast email checking</div>
                    </li>
                </ul>
                <a class="btn-solid-reg mfp-close" href="sign-up.html">SIGN UP</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of lightbox-basic -->
<!-- end of details lightbox 3 -->
<!-- end of details lightboxes -->




<!-- Video -->
<div id="video" class="basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="above-heading">VIDEO</div>
            </div>
            <div class="col-lg-12">
                <!-- Video Preview -->

                <div class="image-container">
                    <div class="video-wrapper">
                        <a class="popup-youtube" href="" data-effect="fadeIn">
                            <img class="img-fluid" src="<?= base_url('assets/') ?>images/pnb.jpg" alt="alternative">
                            <span class="video-play-button">
                                <span></span>
                            </span>
                        </a>
                    </div> <!-- end of video-wrapper -->
                </div> <!-- end of image-container -->
                <!-- end of video preview -->

                <div class="p-heading">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo sit nisi sint? Facere ullam perferendis tempore ad illo. Exercitationem, optio?</div>
            </div> <!-- end of col -->

        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-2 -->
<!-- end of video -->

<!-- Testimonials -->
<div id="testimoni" class="slider-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="above-heading">TESTIMONI</div>
            </div> <!-- end of col -->
            <div class="col-lg-12">

                <!-- Text Slider -->
                <div class="slider-container">
                    <div class="swiper-container text-slider">
                        <div class="swiper-wrapper">
                        <?php foreach ($review as $view) : ?>
                      
                            <!-- Slide -->
                            <div class="swiper-slide">
                                <div class="image-wrapper">
                                    <img class="img-fluid" src="<?= base_url().'assets/img/pnb2.png' ?>" alt="alternative" width="80px">
                                </div> <!-- end of image-wrapper -->
                                <div class="text-wrapper">
                                    <div class="testimonial-text"><?= $view->review ?></div>
                                    <div class="testimonial-author"><?= $view->nama_lengkap  ?></div>
                                    <?php
                                        $rating = intval($view->rating); // Convert rating to integer
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<i class="fas fa-star" style="color: yellow;font-size: 18px;"></i>'; // Yellow star for rating
                                            } else {
                                                echo '<i class="fas fa-star"></i>'; // Empty star for remaining
                                            }
                                        }
                                        ?>
                                </div> <!-- end of text-wrapper -->
                            </div> <!-- end of swiper-slide -->
                            <!-- end of slide -->
                            <?php endforeach; ?>
                            <!-- Slide -->
                            

                        </div> <!-- end of swiper-wrapper -->

                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- end of add arrows -->

                    </div> <!-- end of swiper-container -->
                </div> <!-- end of slider-container -->
                <!-- end of text slider -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of slider-2 -->
<!-- end of testimonials -->

<!-- Modal FAQ -->
<div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="modalFullTitle">Frequently Asked Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <section class="main-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="accordion" id="accordionExample">

                                    <div class="accordion-item">
                                        <?php foreach ($faq as $item) :  ?>
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $item['id_faq'] ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                                    <span><?= $item['pertanyaan'] ?></span>
                                                </button>
                                            </h2>
                                            <div id="collapseOne<?= $item['id_faq'] ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body"> <?= $item['jawaban'] ?> </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>