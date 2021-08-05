    <!-- nav broadcrumb -->
    <nav aria-label="breadcrumb" class="sign justify-content-end">
    	<ol class="breadcrumb">
    		<li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="a-underlined">Home</a></li>
    		<li class="breadcrumb-item active" aria-current="page">Artikel</li>
    	</ol>
    </nav>
    <!-- end nav broadcrumb -->

    <!--blog start-->
    <section id="blog" class="gallery">
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
    											<a href="#">
    												<?= $a['title'] ?>
    											</a>
    										</h3>
    										<p>
    											<?= $a['preview'] ?>
    										</p>
    										<div class="about-btn">
    											<a href="<?= base_url('artikel/') . $a['id']; ?>">
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


    					<?php endforeach; ?>
    				</div>
    				<!--/.row-->

    			</div>
    			<!--/.blog-content-->
    		</div>
    		<!--/.blog-details-->
    	</div>
    	<!--/.container-->

    </section>
    <!--/.blog-->
    <!--blog end-->