                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('kategori')) : ?>
                                <div class="flashdata" data-kategori="<?= $this->session->flashdata('kategori'); ?>" data-title="Kategori"></div>
                            <?php elseif ($this->session->flashdata('message')) : ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Artikel"></div>
                            <?php endif; ?>
                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($artikel as $a) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $a['title'];  ?></td>
                                            <td><?= $a['penulis'];  ?></td>
                                            <td><?= $a['kategori'];  ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/artikel/view/' . $a['slug']); ?>" class="badge badge-warning">View</a>
                                                <a href="<?= base_url('admin/artikel/edit/' . $a['slug']); ?>" class="badge badge-success">Edit</a>
                                                <a href="<?= base_url('admin/artikel/delete/' . $a['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                <!-- Kategori Artikel -->
                <div class="container-fluid mt-5">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Kategori Artikel</h1>

                    <div class="row">
                        <div class="col-lg">

                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <a href="" class="btn btn-primary mb-4 add-button" data-toggle="modal" data-target="#formModal">Add New Kategori Artikel</a>

                            <table id="kategori" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori_wisata as $kw) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $kw['kategori'];  ?></td>
                                            <td>
                                                <a href="<?= base_url(); ?>" data-toggle="modal" data-target="#formEditModal<?= $kw['id']; ?>" class="badge badge-success">Edit</a>
                                                <a href="<?= base_url('admin/artikel/delete_kategori/' . $kw['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <!-- /kategori artikel -->

                <!-- Modal add -->
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Add New Kategori Artikel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/artikel/add_kategori'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="form-group">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="kategori_artikel" name="kategori_artikel" placeholder="Nama kategori artikel..">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal edit -->
                <?php foreach ($kategori_wisata as $kw) : ?>
                    <div class="modal fade" id="formEditModal<?= $kw['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Edit Kategori</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/artikel/edit_kategori'); ?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id" value="<?= $kw['id']; ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="kategori_artikel" name="kategori_artikel" value="<?= $kw['kategori']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Change</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                </div>
                <!-- End of Main Content -->

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->