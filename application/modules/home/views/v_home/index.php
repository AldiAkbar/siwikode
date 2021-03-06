    <!-- header -->
    <div class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-container">
                            <h1 class="header-title">ENJOY YOUR HOLIDAY</h1>
                            <p class="p-heading p-large">SIWIKODE adalah web yang memberikan informasi sekaligus tempat
                                untuk mempromosikan</p>
                            <p class="p-heading p-large">wisata rekreasi dan wisata kuliner di sekitar wilayah kota
                                Depok.</p>
                            <a class="btn btn-solid-lg btn-promote" href="<?= base_url('auth') ?>">Promote Your Place</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- Wisata rekreasi -->
    <section id="wisata-rekreasi" class="gallery">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>Wisata Rekreasi</h2>
                <p>Berikut ini kami berikan beberapa referensi wisata rekreasi di wilayah kota Depok.</p>
            </div>
            <!--/.gallery-header-->
            <div class="gallery-box">
                <div class="gallery-content">
                    <div class="filtr-container">
                        <div class="row">

                            <?php foreach ($rekreasi as $r) : ?>
                                <?php if ($r['id'] < 6) : ?>
                                    <?php if ($r['id'] == 1 or $r['id'] == 2) : ?>
                                        <div class="col-md-6">
                                        <?php else : ?>
                                            <div class="col-md-4">
                                            <?php endif; ?>
                                            <div class="filtr-item">
                                                <img src="<?= base_url('asset/img/rekreasi/') . $r['image']; ?>" alt="portfolio image" />
                                                <div class="item-title">
                                                    <a href="<?= base_url('rekreasi/') . $r['slug']; ?>">
                                                        <?= $r['name']; ?>
                                                    </a>
                                                </div><!-- /.item-title -->
                                            </div><!-- /.filtr-item -->
                                            </div><!-- /.col -->
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                        </div><!-- /.row -->

                                        <div class="button-details">
                                            <div class="row text-center">
                                                <div class="col align-center">
                                                    <a href="<?= base_url('rekreasi'); ?>" class="btn btn-solid-lg btn-promote">Lihat Semua</a>
                                                </div>
                                            </div>
                                        </div>

                        </div><!-- /.filtr-container-->
                    </div><!-- /.gallery-content -->
                </div>
                <!--/.galley-box-->
            </div>
            <!--/.container-->

    </section>
    <!--/.gallery-->
    <!--gallery end-->

    <!--blog start-->
    <section id="blog" class="blog">
        <div class="container">
            <div class="blog-details">
                <div class="gallary-header text-center">
                    <h2>
                        Artikel
                    </h2>
                    <p>
                        Berikut ini informasi - informasi terbaru seputar wisata yang yang ada di Kota Depok.
                    </p>
                </div>
                <!--/.gallery-header-->
                <div class="blog-content">
                    <div class="row">

                        <?php foreach ($artikel as $a) : ?>
                            <?php if ($a['id'] < 4) : ?>

                                <div class="col-sm-4 col-md-4">
                                    <div class="thumbnail">
                                        <h2>Trending News <span><?= date('d M Y', strtotime($a['date_created'])); ?></span></h2>
                                        <div class="thumbnail-img">
                                            <img src="<?= base_url('asset/img/artikel/') . $a['image']; ?>" alt="blog-img">
                                            <div class="thumbnail-img-overlay"></div>
                                            <!--/.thumbnail-img-overlay-->

                                        </div>
                                        <!--/.thumbnail-img-->

                                        <div class="caption">
                                            <div class="blog-txt">
                                                <h3>
                                                    <a href="<?= base_url('artikel/') . $a['slug']; ?>">
                                                        <?= $a['title'] ?>
                                                    </a>
                                                </h3>
                                                <p>
                                                    <?= $a['preview'] ?>
                                                </p>
                                                <div class="about-btn">
                                                    <a href="<?= base_url('artikel/') . $a['slug']; ?>">
                                                        <button class="about-view packages-btn">
                                                            Details
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                            <!--/.blog-txt-->
                                        </div>
                                        <!--/.caption-->
                                    </div>
                                    <!--/.thumbnail-->

                                </div>
                                <!--/.col-->

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                    <!--/.row-->

                    <div class="button-details">
                        <div class="row text-center">
                            <div class="col align-center">
                                <a href="<?= base_url('artikel'); ?>" class="btn btn-solid-lg btn-promote">Lihat Semua</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!--/.blog-content-->
            </div>
            <!--/.blog-details-->
        </div>
        <!--/.container-->

    </section>
    <!--/.blog-->
    <!--blog end-->

    <!-- wisata kuliner -->
    <section id="wisata-kuliner" class="packages">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Wisata Kuliner
                </h2>
                <p>
                    Berikut ini daftar wisata kuliner populer di daerah kota Depok.
                </p>
            </div>
            <!--/.gallery-header-->
            <div class="packages-content">
                <div class="row">

                    <?php foreach ($kuliner as $k) : ?>
                        <?php if ($k['id'] < 7) : ?>

                            <div class="col-md-4 col-sm-6">
                                <div class="single-package-item">
                                    <img src="<?= base_url('asset/img/kuliner/') . $k['image']; ?>" alt="package-place">
                                    <div class="single-package-item-txt">
                                        <h3><?= $k['name']; ?></h3>
                                        <div class="packages-para">
                                            <p class="address">
                                                <i class="fa fa-angle-right"></i><?= $k['menu'] ?>
                                            </p>
                                            <p>
                                                <i class="fa fa-angle-right"></i> <?= $k['time_open'] ?>
                                            </p>
                                        </div>
                                        <!--/.packages-para-->
                                        <div class="packages-review">
                                            <p>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span>999 review</span>
                                            </p>
                                        </div>
                                        <!--/.packages-review-->
                                        <div class="about-btn">
                                            <a href="<?= base_url('kuliner/') . $k['slug']; ?>">
                                                <button class="about-view packages-btn">
                                                    Details
                                                </button>
                                            </a>
                                        </div>
                                        <!--/.about-btn-->
                                    </div>
                                    <!--/.single-package-item-txt-->
                                </div>
                                <!--/.single-package-item-->
                            </div>
                            <!--/.col-->

                        <?php endif; ?>
                    <?php endforeach; ?>

                </div> <!-- /.row-->

                <div class="button-details">
                    <div class="row text-center">
                        <div class="col align-center">
                            <a href="<?= base_url('kuliner'); ?>" class="btn btn-solid-lg btn-promote">Lihat Semua</a>
                        </div>
                    </div>
                </div>

            </div> <!-- /.content-section-->

        </div> <!-- /.container -->

    </section>
    <!-- end wisata kuliner -->

    <!-- testemonial start -->
    <section id="testimoni" class="testimonial-section">
        <div class="container px-lg-4 px-md-4">
            <div class="gallary-header text-center">
                <h2>
                    Testimoni
                </h2>
                <p>
                    Berikut ini beberapa testimoni dari beberapa orang yang mendapat rekomendasi tempat dari web ini.
                </p>
            </div>
            <!--/.gallery-header-->

            <div class="row">

                <div class="col-md-12">
                    <div class="testimonials">
                        <div class="owl-carousel" id="carousel1">

                            <?php foreach ($testimoni as $t) : ?>
                                <div class="item">
                                    <div class="card text-center">
                                        <img class="card-img-top" src="<?= base_url('asset/img/testimoni/') . $t['image']; ?>" alt="img">
                                        <div class="card-body">
                                            <h5><?= $t['name']; ?></h5>
                                            <p class="job"><?= $t['job']; ?></p>
                                            <p class="card-text"><?= $t['description']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;  ?>

                        </div> <!-- /.carousel -->
                    </div> <!-- /.testimoni -->

                </div> <!-- /.col-->

            </div> <!-- /.row -->

        </div> <!-- /.container-->
    </section>
    <!-- testimonial end -->

    <section id="contact" class="form">
        <div class="container">
            <div class="gallary-header text-center">
                <h2>
                    Contact Us
                </h2>
                <p>
                    Silahkan berikan pertanyaan ataupun kritik dan saran untuk website ini.
                </p>
            </div>

            <!-- Contact -->
            <div id="contact" class="form-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 form-explain">
                            <div class="text-container">
                                <h2>Form responden pengguna website SIWIKODE</h2>
                                <p>Anda bisa memberikan saran atau kritik serta pertanyaan terkait dengan website SIWIKODE ini dengan mengisi form di samping atau dengan menghubungi kontak dibawah ini.</p>
                                <ul class="list-unstyled li-space-lg">
                                    <li class="address"><i class="fas fa-map-marker-alt"></i> Jl. Sejahtera No. 9 RT 03 RW 01 Lenteng Agung, Jakarta Selatan 51241</li>
                                    <li><i class="fas fa-phone "></i><a class="a-colored" href="tel:003024630820">+62 852 2943 8775</a></li>
                                    <li><i class="fas fa-phone "></i><a class="a-colored" href="tel:003024630820">+62 895 6178 27748</a></li>
                                    <li><i class="fas fa-envelope "></i><a class="a-colored" href="mailto:office@aria.com">siwikode@gmail.com</a></li>
                                </ul>

                                <div class="contact-sosmed">
                                    <h3 class="judul-sosmed">Follow SIWIKODE on Social Media</h3>
                                    <div class="icon-sosmed">
                                        <a href="" target="_blank">
                                            <i class="fab fa-facebook a-colored"></i>
                                        </a>
                                        <a href="" target="_blank">
                                            <i class="fab fa-twitter a-colored"></i>
                                        </a>
                                        <a href="" target="_blank">
                                            <i class="fab fa-instagram a-colored"></i>
                                        </a>
                                        <a href="" target="_blank">
                                            <i class="fab fa-youtube a-colored"></i>
                                        </a>
                                        <a href="" target="_blank">
                                            <i class="fab fa-linkedin a-colored"></i>
                                        </a>
                                        <a href="" target="_blank">
                                            <i class="fab fa-github a-colored"></i>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- end of text-container -->
                        </div> <!-- end of col -->
                        <div class="col-lg-6">
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                            <!-- Contact Form -->
                            <form action="<?= base_url('home/inbox'); ?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="pesan" rows="5" placeholder="Masukkan Pesan"></textarea>
                                </div>
                                <div class="form-group checkbox">
                                    <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I agree with SIWIKODE stated <a href="" class="a-underlined">Privacy Policy</a> and <a href="" class="a-underlined">Terms Conditions</a>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" class="btn btn-solid-lg btn-form">SUBMIT MESSAGE</button>
                            </form>
                            <!-- end of contact form -->

                        </div> <!-- end of col -->
                    </div> <!-- end of row -->
                </div> <!-- end of container -->
            </div> <!-- end of form-2 -->
            <!-- end of contact -->

        </div>
    </section>