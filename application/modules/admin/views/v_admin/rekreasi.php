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

                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Wisata Rekreasi"></div>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Wisata</th>
                                        <th scope="col">Jenis Wisata</th>
                                        <th scope="col">Fasilitas</th>
                                        <th scope="col">Tiket Masuk</th>
                                        <th scope="col">Jam Buka</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($rekreasi as $r) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $r['name'];  ?></td>
                                            <td><?= $r['jenis'];  ?></td>
                                            <td><?= $r['facility'];  ?></td>
                                            <td><?= $r['ticket'];  ?></td>
                                            <td><?= $r['time_open'];  ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/rekreasi/view/' . $r['slug']); ?>" class="badge badge-warning">View</a>
                                                <a href="<?= base_url('admin/rekreasi/edit/' . $r['slug']); ?>" class="badge badge-success">Edit</a>
                                                <a href="<?= base_url('admin/rekreasi/delete/' . $r['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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