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

                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Message"></div>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Asction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($message as $m) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $m['nama'];  ?></td>
                                            <td><?= $m['email'];  ?></td>
                                            <td><?= $m['pesan'];  ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/message/delete/' . $m['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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