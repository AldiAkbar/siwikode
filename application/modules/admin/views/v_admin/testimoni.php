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

                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Testimoni"></div>
                            <a href="" class="btn btn-primary mb-4 add-button" data-toggle="modal" data-target="#formModal">Add New Testimoni</a>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Foto</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pekerjaan</th>
                                        <th scope="col">Testimoni</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($testimoni as $t) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <th><img src="<?= base_url('asset/img/testimoni/') ?><?= $t['image'] ?>" style="width: 50px; height: 50px;"></th>
                                            <td><?= $t['name'];  ?></td>
                                            <td><?= $t['job'];  ?></td>
                                            <td><?= $t['description'];  ?></td>
                                            <td>
                                                <a href="" class="badge badge-success btn-edit" data-toggle="modal" data-target="#formEditModal<?= $t['id']; ?>">Edit</a>
                                                <a href="<?= base_url('admin/testimoni/delete/' . $t['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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

                </div>
                <!-- End of Main Content -->

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal add -->
                <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="formModalLabel">Edit Wisata Kuliner</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/testimoni'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="role" name="name" placeholder="Nama lengkap">
                                    </div>
                                    <div class=" form-group">
                                        <input type="text" class="form-control" id="role" name="job" placeholder="Pekerjaan">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="role" name="description" placeholder="Testimoni">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label for="image" class="custom-file-label">Choose file</label>
                                        </div>
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

                <!-- Modal edit -->
                <?php foreach ($testimoni as $t) : ?>
                    <div class="modal fade" id="formEditModal<?= $t['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Edit Wisata Kuliner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/testimoni/edit'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id" value="<?= $t['id']; ?>">
                                        <input type="hidden" name="oldImage" id="oldImage" value="<?= $t['image']; ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="name" value="<?= $t['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="job" value="<?= $t['job']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="description" value="<?= $t['description']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="image" name="image">
                                                <label for="image" class="custom-file-label"><?= $t['image'] ?></label>
                                            </div>
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