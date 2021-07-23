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

                            <?= $this->session->flashdata('message'); ?>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Penulis</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Foto</th>
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
                                            <td><?= $a['image'];  ?></td>
                                            <td>
                                                <a href="" class="badge badge-success btn-edit" data-toggle="modal" data-target="#formEditModal<?= $a['id']; ?>">Edit</a>
                                                <a href="<?= base_url('admin/artikel/delete/' . $a['id']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
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

                <!-- Modal edit -->
                <?php foreach ($artikel as $a) : ?>
                    <div class="modal fade" id="formEditModal<?= $a['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Edit Artikel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/artikel'); ?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id" value="<?= $a['id']; ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="penulis" value="<?= $a['penulis']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="title" value="<?= $a['title']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="kategori" id="kategori" class="form-control">
                                                <?php foreach ($category_artikel as $ca) : ?>
                                                    <?php if ($a['category_artikel_id'] == $ca['id']) : ?>
                                                        <option value="<?= $ca['id']; ?>" selected><?= $ca['category']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $ca['id']; ?>"><?= $ca['category']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
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