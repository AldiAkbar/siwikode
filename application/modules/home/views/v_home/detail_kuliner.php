    <!-- nav broadcrumb -->
    <nav aria-label="breadcrumb" class="sign justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="a-underlined">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('home/kuliner') ?>" class="a-underlined">Wisata Kuliner</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $kuliner['name']; ?></li>
        </ol>
    </nav>
    <!-- end nav broadcrumb -->

    <section class="gallery">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    <?= $kuliner['name']; ?>
                </h2>
                <div class="packages-review">
                    <p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </p>
                </div>
                <!--/.packages-review-->
            </div>
            <!--/.gallery-header-->

            <div class="gallery-box">
                <div class="gallery-content">
                    <div class="filtr-container">
                        <div class="row">

                            <div class="col-md-4">
                                <div class="filtr-item">
                                    <img src="<?= base_url('asset/img/kuliner/') . $kuliner['image']; ?>" alt="portfolio image" />
                                </div><!-- /.filtr-item -->
                            </div><!-- /.col -->

                            <div class="col-md-4">
                                <div class="filtr-item">
                                    <img src="<?= base_url('asset/img/kuliner/') . $kuliner['image']; ?>" alt="portfolio image" />
                                </div><!-- /.filtr-item -->
                            </div><!-- /.col -->

                            <div class="col-md-4">
                                <div class="filtr-item">
                                    <img src="<?= base_url('asset/img/kuliner/') . $kuliner['image']; ?>" alt="portfolio image" />
                                </div><!-- /.filtr-item -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->

                    </div><!-- /.filtr-container-->
                </div><!-- /.gallery-content -->
            </div>
            <!--/.galley-box-->

            <div class="item-desc">
                <div class="row">

                    <div class="col-md-6">
                        <div class="title-desc">
                            <h4>Deskripsi Wisata</h4>
                        </div>

                        <div class="pdesc">
                            <p><?= $kuliner['deskripsi']; ?></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="title-desc">
                            <h4>Lokasi Wisata</h4>
                        </div>

                        <div class="pdesc">
                            <ul>
                                <li>
                                    <p><strong>Alamat</strong> : <?= $kuliner['address']; ?></p>
                                </li>
                                <li>
                                    <p><strong>Menu</strong> : <?= $kuliner['menu']; ?></p>
                                </li>
                                <li>
                                    <p><strong>Harga</strong> : <?= $kuliner['price']; ?></p>
                                </li>
                                <li>
                                    <p><strong>Buka</strong> : <?= $kuliner['time_open']; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- /.container -->
    </section>
    <!-- end detail rekreasi -->

    <!-- testemonial start -->
    <section id="testimoni" class="testimonial-section">
        <div class="container px-lg-4 px-md-4">
            <div class="gallary-header text-center">
                <h2>
                    Testimoni
                </h2>
                <p>
                    Berikut ini beberapa testimoni dari beberapa orang yang telah mengunjungi tempat ini.
                </p>
            </div>
            <!--/.gallery-header-->

            <div class="row">

                <div class="col-md-12">
                    <div class="testimonials">
                        <div class="owl-carousel" id="carousel1">

                            <div class="item">
                                <div class="card text-center">
                                    <img class="card-img-top" src="<?= base_url('asset/img/testimoni/') ?>testi1.jpg" alt="img">
                                    <div class="card-body">
                                        <h5>Via Vallen</h5>
                                        <p class="job">Penyanyi</p>
                                        <p class="card-text">Salah satu restoran Jepang yang cukup lama dan terkenal di Depok. Tempatnya ada indoor AC dan outdoor. Karaagenya lumayan crispy dan matangnya pas. Cheese sticknya juga enak.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card text-center">
                                    <img src="<?= base_url('asset/img/testimoni/') ?>testi3.jpg" class="card-img-top" alt="img">
                                    <div class="card-body">
                                        <h5>M. Kahfi Alfath Baihaqi</h5>
                                        <p class="job">Mahasiswa</p>
                                        <p class="card-text"> Tempatnya nyaman dan lumayan enak buat yg lagi pengen masakan Jepang. Awalnya memang buka di kawasan Margonda dekat kampus dan terjangkau buat kalangan mahasiswa.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card text-center">
                                    <img src="<?= base_url('asset/img/testimoni/') ?>testi2.jpg" class="card-img-top" alt="img">
                                    <div class="card-body">
                                        <h5>Anies Baswedan</h5>
                                        <p class="job">Gubernur DKI Jakarta</p>
                                        <p class="card-text">Tempatnya nyaman banget. Enak buat meeting atau nongkrong bareng temen. Shabu nya cocok buat dimakan rame - rame, saladnya juga fresh. Overall puas lah makan disini.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card text-center">
                                    <img class="card-img-top" src="<?= base_url('asset/img/testimoni/') ?>testi1.jpg" alt="img">
                                    <div class="card-body">
                                        <h5>Via Vallen</h5>
                                        <p class="job">Penyanyi</p>
                                        <p class="card-text">Salah satu restoran Jepang yang cukup lama dan terkenal di Depok. Tempatnya ada indoor AC dan outdoor. Karaagenya lumayan crispy dan matangnya pas. Cheese sticknya juga enak.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card text-center">
                                    <img src="<?= base_url('asset/img/testimoni/') ?>testi3.jpg" class="card-img-top" alt="img">
                                    <div class="card-body">
                                        <h5>M. Kahfi Alfath Baihaqi</h5>
                                        <p class="job">Mahasiswa</p>
                                        <p class="card-text"> Tempatnya nyaman dan lumayan enak buat yg lagi pengen masakan Jepang. Awalnya memang buka di kawasan Margonda dekat kampus dan terjangkau buat kalangan mahasiswa.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="card text-center">
                                    <img src="<?= base_url('asset/img/testimoni/') ?>testi2.jpg" class="card-img-top" alt="img">
                                    <div class="card-body">
                                        <h5>Anies Baswedan</h5>
                                        <p class="job">Gubernur DKI Jakarta</p>
                                        <p class="card-text">Tempatnya nyaman banget. Enak buat meeting atau nongkrong bareng temen. Shabu nya cocok buat dimakan rame - rame, saladnya juga fresh. Overall puas lah makan disini.</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div> <!-- /.col-->
            </div> <!-- /.row -->

        </div> <!-- /.container-->
    </section>
    <!-- testimonial end -->