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
                    <?= form_open_multipart('writer/kuliner'); ?>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header bg-primary" style="color: white;">Data Wisata Kuliner</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="m">Nama Wisata Kuliner</label>
                                        <input id="m" name="nama_restoran" class="form-control"></input>
                                        <?= form_error('nama_restoran', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="s">Jenis Wisata Kuliner</label>
                                        <select name="jenis_restoran" id="jenis_restoran" class="form-control">
                                            <option value="">Jenis Restoran</option>
                                            <?php foreach ($jenis_kuliner as $jk) : ?>
                                                <option value="<?= $jk['id']; ?>"><?= $jk['jenis']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('jenis_restoran', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Menu</label>
                                        <input id="judul" name="menu" class="form-control"></input>
                                        <?= form_error('menu', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Harga Per Porsi</label>
                                        <input id="judul" name="harga" class="form-control"></input>
                                        <small class="text-muted">Contoh: 20.000 - 30.000 per porsi</small>
                                        <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Alamat</label>
                                        <input id="judul" name="alamat" class="form-control"></input>
                                        <?= form_error('alamat', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Waktu Buka</label>
                                        <input id="judul" name="buka" class="form-control"></input>
                                        <?= form_error('buka', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="w">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label for="image" class="custom-file-label">Choose file</label>
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
                                        <textarea id="ckeditor" name="deskripsi" placeholder="deskripsi kuliner" class="form-control"></textarea>
                                        <?= form_error('deskripsi', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-md-4" style="margin-top: 20px;"><i class="fa fa-paper-plane"></i> KIRIM</button>
                        </div>

                    </div>
                </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->`