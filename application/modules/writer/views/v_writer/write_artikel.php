    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="row">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Artikel"></div>
                    </div>

                </div>
                <div class="card-body">
                    <?= form_open_multipart('writer/artikel'); ?>

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card">
                                <div class="card-header bg-primary" style="color: white;">Data Artikel</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="m">Nama Penulis</label>
                                        <input id="m" name="penulis" class="form-control"></input>
                                        <?= form_error('penulis', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Judul Artikel</label>
                                        <input id="judul" name="judul_artikel" class="form-control"></input>
                                        <?= form_error('judul_artikel', '<small class="text-danger">', '</small>') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="s">Kategori</label>
                                        <select name="kategori" id="kategori" class="form-control">
                                            <option value="">Select Kategori</option>
                                            <?php foreach ($kategori_wisata as $kw) : ?>
                                                <option value="<?= $kw['id']; ?>"><?= $kw['kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger">', '</small>') ?>
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
                                <div class="card-header bg-primary" style="color: white;">Deskripsi Artikel</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input id="deskripsi" type="hidden" name="deskripsi">
                                        <trix-editor input="deskripsi"></trix-editor>
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
    <!-- /.content -->