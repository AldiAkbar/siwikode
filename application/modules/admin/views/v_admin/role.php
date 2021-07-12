
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">

                            <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                            <?= $this->session->flashdata('message'); ?>
                            <a href="" class="btn btn-primary mb-4 add-button" data-toggle="modal" data-target="#formRoleModal" >Add New Role</a>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['role'];  ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/Role/roleAccess/'.$r['id']); ?>" class="badge badge-info">Access</a>
                                            <a href="" class="badge badge-success edit-button" data-toggle="modal" data-target="#formEditModal<?= $r['id']; ?>">Edit</a>
                                            <a href="<?= base_url('admin/role/deleteRole/'.$r['id']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
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
    <div class="modal fade" id="formRoleModal" tabindex="-1" aria-labelledby="formRoleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="formRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/role'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Type your new role..">
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
    <?php foreach($role as $r) : ?>
    <div class="modal fade" id="formEditModal<?= $r['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Role Access</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/role/editRole'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $r['id']; ?>">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" >
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