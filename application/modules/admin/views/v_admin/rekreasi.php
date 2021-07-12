                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">

                            <?php if(validation_errors() ) : ?>
                                <div class="alert alert-danger" role="alert"> 
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <?= $this->session->flashdata('message'); ?>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Wisata</th>
                                        <th scope="col">Jenis Wisata</th>
                                        <th scope="col">Fasilitas</th>
                                        <th scope="col">Tiket Masuk</th>
                                        <th scope="col">Jam Buka</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($rekreasi as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['name'];  ?></td>
                                        <td><?= $r['jenis'];  ?></td>
                                        <td><?= $r['facility'];  ?></td>
                                        <td><?= $r['ticket'];  ?></td>
                                        <td><?= $r['time_open'];  ?></td>
                                        <td>
                                            <a href="" class="badge badge-success btn-edit" data-toggle="modal" data-target="#formEditModal<?= $r['id']; ?>">Edit</a>
                                            <a href="<?= base_url('admin/rekreasi/delete/'.$r['id']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
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
    <?php foreach($rekreasi as $r) : ?>
    <div class="modal fade" id="formEditModal<?= $r['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Wisata Rekreais</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/rekreasi'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $r['id']; ?>">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="name" value="<?= $r['name']; ?>" >
                        </div>
                        <div class="form-group">
                            <select name="jenis_rekreasi" id="jenis_rekreasi" class="form-control">
                                <?php foreach($jenis_rekreasi as $jr) : ?>
                                    <?php if( $r['jenis_kuliner_id'] == $jr['id'] ) : ?>
                                        <option value="<?= $jr['id']; ?>" selected><?= $jr['jenis']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jr['id']; ?>"><?= $jr['jenis']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="facility" value="<?= $r['facility']; ?>" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="ticket" value="<?= $r['ticket']; ?>" >
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="time_open" value="<?= $r['time_open']; ?>" >
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
