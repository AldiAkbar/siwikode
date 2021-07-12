    <!-- nav broadcrumb -->
    <nav aria-label="breadcrumb" class="sign justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tentang</li>
        </ol>
    </nav>
    <!-- end nav broadcrumb -->
    
    <!-- testemonial start -->
    <section id="testimoni" class="gallery">
        <div class="container px-lg-4 px-md-4">
            <div class="gallary-header text-center">
                <h2>
                    Tentang
                </h2>
                <p>
                    Berikut ini anggota kelompok yang telah berkontribusi dalam pembuatan website SIWIKODE ini.
                </p>
            </div><!--/.gallery-header-->

            <div class="row">

                <?php foreach($kontributor as $k) : ?>
                <div class="col-md-6 mb-3">
                    <div class="testimonials">
                            
                            <div class="item">
                                <div class="card text-center">
                                    <img class="card-img-top" src="<?= base_url('asset/img/kontributor/') . $k['image']; ?>" alt="img">
                                    <div class="card-body">
                                        <h5><?= $k['name']; ?></h5>
                                        <p class="job"><?= $k['nim']; ?></p>
                                        <div class="icon-sosmed">
                                            <a href="#" target="_blank">
                                                <i style="font-size: 1.75rem; color: #565a5c; padding-left: 10px; padding-right: 10px;" class="fab fa-facebook"></i>
                                            </a>
                                            <a href="#" target="_blank">
                                                <i style="font-size: 1.75rem; color: #565a5c; padding-left: 10px; padding-right: 10px;" class="fab fa-twitter"></i>
                                            </a>
                                            <a href="#" target="_blank">
                                                <i style="font-size: 1.75rem; color: #565a5c; padding-left: 10px; padding-right: 10px;" class="fab fa-instagram"></i>
                                            </a>
                                            <a href="#" target="_blank">
                                                <i style="font-size: 1.75rem; color: #565a5c; padding-left: 10px; padding-right: 10px;" class="fab fa-youtube"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                        
                </div> <!-- /.col-->
                <?php endforeach; ?>

            </div> <!-- /.row -->

        </div> <!-- /.container-->
    </section>
    <!-- testimonial end -->