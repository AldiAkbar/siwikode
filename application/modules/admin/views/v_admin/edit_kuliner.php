    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="row">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Wisata Kuliner"></div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="card">
                                    <div class="card-header bg-primary" style="color: white;">Data Wisata Kuliner</div>
                                    <div class="card-body">
                                        <input type="hidden" name="id" id="id" value="<?= $kuliner['id'] ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="m">Nama Wisata Kuliner</label>
                                            <input id="m" name="nama_restoran" class="form-control" value="<?= $kuliner['name'] ?>"></input>
                                            <?= form_error('nama_restoran', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="s">Jenis Wisata Kuliner</label>
                                            <select name="jenis_restoran" id="jenis_restoran" class="form-control">
                                                <option value="">Jenis Restoran</option>
                                                <?php foreach ($jenis_kuliner as $jk) : ?>
                                                    <?php if ($kuliner['jenis_kuliner_id'] == $jk['id']) : ?>
                                                        <option value="<?= $jk['id']; ?>" selected><?= $jk['jenis']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $jk['id']; ?>"><?= $jk['jenis']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('jenis_restoran', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Menu</label>
                                            <input id="judul" name="menu" class="form-control" value="<?= $kuliner['menu'] ?>"></input>
                                            <?= form_error('menu', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Harga Per Porsi</label>
                                            <input id="judul" name="harga" class="form-control" value="<?= $kuliner['price'] ?>"></input>
                                            <small class="text-muted">Contoh: 20.000 - 30.000 per porsi</small>
                                            <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Alamat</label>
                                            <input id="judul" name="alamat" class="form-control" value="<?= $kuliner['address'] ?>"></input>
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Waktu Buka</label>
                                            <input id="judul" name="buka" class="form-control" value="<?= $kuliner['time_open'] ?>"></input>
                                            <?= form_error('buka', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="w">Foto</label>
                                            <div class="custom-file">
                                                <input type="hidden" name="old_image" id="old_image" value="<?= $kuliner['image'] ?>">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label for="image" class="custom-file-label"><?= $kuliner['image'] ?></label>
                                            </div>
                                            <?= form_error('image', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary" style="color: white;">Deskripsi Wisata Kuliner</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input id="deskripsi" type="hidden" name="deskripsi" value="<?= $kuliner['deskripsi'] ?>">
                                            <trix-editor input="deskripsi"></trix-editor>
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-md-4" style="margin-top: 20px;"><i class="fa fa-paper-plane"></i> KIRIM</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->`