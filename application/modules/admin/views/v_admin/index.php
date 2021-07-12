
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('admin/user') ?>">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    User</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('admin/rekreasi') ?>">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Wisata Rekreasi</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_rekreasi; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-mountain fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('admin/kuliner') ?>">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Wisata Kuliner</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_kuliner; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <a href="<?= base_url('admin/artikel') ?>">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Artikel</div>
                                            </a>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_artikel; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-newspaper fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->