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

            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="User"></div>
            <a href="" class="btn btn-primary mb-4 add-button" data-toggle="modal" data-target="#formModal">Add New User</a>

            <table id="example" class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Level</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($listUser as $lu) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><img src="<?= base_url('asset/img/profile/') . $lu['image']; ?>" width="40" height="40"></td>
                            <td><?= $lu['name'];  ?></td>
                            <td><?= $lu['email'];  ?></td>
                            <td><?= $lu['is_active'];  ?></td>
                            <td><?= $lu['role_id'];  ?></td>
                            <td>
                                <a href="" class="badge badge-success edit-button" data-toggle="modal" data-target="#formEditModal<?= $lu['id']; ?>">Edit</a>
                                <a href="<?= base_url('admin/User_Management/deleteUser/' . $lu['id']); ?>" class="badge badge-danger tombol-hapus">Delete</a>
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

<!-- Modal add -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/User_Management'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>
                    <div class="form-group">
                        <label for="role_id" class="font-weight-bold">Level</label>
                        <select name="role_id" class="form-control">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="is_active" class="font-weight-bold">Aktivasi</label>
                        <select name="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Non-Active</option>
                        </select>
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
<?php foreach ($listUser as $lu) : ?>
    <div class="modal fade" id="formEditModal<?= $lu['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/User_Management/editUser'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $lu['id']; ?>">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="font-weight-bold">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $lu['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= $lu['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <small class="text-danger">Kosongkan jika tidak akan di ubah</small>
                        </div>
                        <div class="form-group">
                            <label for="role_id" class="font-weight-bold">Level</label>
                            <select name="role_id" class="form-control">
                                <?php foreach ($role as $r) : ?>
                                    <?php if ($lu['role_id'] == $r['id']) : ?>
                                        <option value="<?= $r['id']; ?>" selected><?= $r['role']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $r['id']; ?>"><?= $r['role']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_active" class="font-weight-bold">Aktivasi</label>
                            <select name="is_active" class="form-control" value="<?= $lu['is_active'] ?>">
                                <option value="1">Active</option>
                                <option value="0">Non-Active</option>
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
    <?php endforeach; ?>`