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

                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Wisata Kuliner"></div>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Restoran</th>
                                        <th scope="col">Jenis Restoran</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jam Buka</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kuliner as $k) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $k['name'];  ?></td>
                                            <td><?= $k['jenis'];  ?></td>
                                            <td><?= $k['menu'];  ?></td>
                                            <td><?= $k['price'];  ?></td>
                                            <td><?= $k['time_open'];  ?></td>
                                            <td>
                                                <a href="" class="badge badge-success btn-edit" data-toggle="modal" data-target="#formEditModal<?= $k['id']; ?>">Edit</a>
                                                <a href="<?= base_url('admin/kuliner/delete/' . $k['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
                <?php foreach ($kuliner as $k) : ?>
                    <div class="modal fade" id="formEditModal<?= $k['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="formModalLabel">Edit Wisata Kuliner</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/kuliner'); ?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id" id="id" value="<?= $k['id']; ?>">
                                        <div class="form-group">
                                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="name" value="<?= $k['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="jenis_kuliner" id="jenis_kuliner" class="form-control">
                                                <option value="">Jenis Wisata Kuliner</option>
                                                <?php foreach ($jenis_kuliner as $jk) : ?>
                                                    <?php if ($k['jenis_kuliner_id'] == $jk['id']) : ?>
                                                        <option value="<?= $jk['id']; ?>" selected><?= $jk['jenis']; ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $jk['id']; ?>"><?= $jk['jenis']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="menu" value="<?= $k['menu']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="price" value="<?= $k['price']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="role" name="time_open" value="<?= $k['time_open']; ?>">
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