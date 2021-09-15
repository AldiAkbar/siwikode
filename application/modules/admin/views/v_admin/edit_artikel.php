    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <p style="display: none;"><?= $title; ?></p>
                    <h3 class="card-title">Edit Artikel</h3>
                    <div class="row">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Artikel"></div>
                    </div>

                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="card">
                                    <div class="card-header bg-primary" style="color: white;">Data Artikel</div>
                                    <div class="card-body">
                                        <input type="hidden" name="id" id="id" value="<?= $artikel['id'] ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="m">Nama Penulis</label>
                                            <input id="m" name="penulis" class="form-control" value="<?= $artikel['penulis'] ?>"></input>
                                            <?= form_error('penulis', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul Artikel</label>
                                            <input id="judul" name="judul_artikel" class="form-control" value="<?= $artikel['title'] ?>"></input>
                                            <?= form_error('judul_artikel', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="s">Kategori</label>
                                            <select name="kategori" id="kategori" class="form-control">
                                                <option value="">Select Kategori</option>
                                                <?php foreach ($kategori_wisata as $kw) : ?>
                                                    <?php if ($kw['id'] == $artikel['kategori_wisata_id']) : ?>
                                                        <option value="<?= $kw['id']; ?>" selected><?= $kw['kategori']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $kw['id']; ?>"><?= $kw['kategori']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="w">Foto</label>
                                            <div class="custom-file">
                                                <input type="hidden" name="old_image" id="old_image" value="<?= $artikel['image'] ?>">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label for="image" class="custom-file-label"><?= $artikel['image'] ?></label>
                                            </div>
                                            <?= form_error('image', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary" style="color: white;">Deskripsi Artikel</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input id="deskripsi" type="hidden" name="deskripsi" value="<?= $artikel['detail_artikel'] ?>">
                                            <trix-editor input="deskripsi"></trix-editor>
                                            <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary col-md-4" style="margin-top: 20px;"><i class="fa fa-paper-plane"></i> KIRIM</button>
                            </div>

                        </div> <!-- ./row -->
                    </form>
                </div> <!-- ./card-body -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->