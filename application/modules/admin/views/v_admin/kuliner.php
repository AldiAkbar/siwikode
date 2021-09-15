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
                                        <th scope="col">Action</th>
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
                                                <a href="<?= base_url('admin/kuliner/view/' . $k['slug']); ?>" class="badge badge-warning">View</a>
                                                <a href="<?= base_url('admin/kuliner/edit/' . $k['slug']); ?>" class="badge badge-success">Edit</a>
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