    <!-- nav broadcrumb -->
    <nav aria-label="breadcrumb" class="sign justify-content-end">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('home/artikel') ?>">Artikel</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $artikel['title'] ?></li>
        </ol>
    </nav>
    <!-- end nav broadcrumb -->
    
    <section class="gallery">
        <div class="container">
            <div class="gallary-header text-center">
                <div class="col-md-8 offset-2">
                    <h2>
                        <?= $artikel['title']; ?>
                    </h2>
                </div>
            </div><!--/.gallery-header-->

            <div class="gallery-box">
                <div class="gallery-content">
                    <div class="filtr-container">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="filtr-artikel">
                                    <img src="<?= base_url('asset/img/artikel/').$artikel['image']; ?>" alt="portfolio image"/>
                                </div><!-- /.filtr-item -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                        
                    </div><!-- /.filtr-container-->
                </div><!-- /.gallery-content -->
            </div><!--/.galley-box-->

            <div class="item-desc">
                <div class="row">
                    <div class="blog-content">
                        <div class="col-md-6 offset-3">
                            <div class="thumbnail">
                                <div class="blog-body">
                                    <p>
                                        <?= $artikel['detail_artikel']; ?>
                                    </p> 
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div> <!-- /.container -->
    </section>
    <!-- end detail rekreasi -->