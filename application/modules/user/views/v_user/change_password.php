<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-title="Password <?= $user['name'] ?>"></div>
    </div>

    <form action="<?= base_url('user/changePassword'); ?>" method="POST">

        <div class="form-group">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
        </div>

        <div class="form-group">
            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="current_password" name="current_password">
                <?= form_error('current_password', '<small class="text-danger" role="alert">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="new_password1" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password1" name="new_password1">
                <?= form_error('new_password1', '<small class="text-danger" role="alert">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group">
            <label for="new_password2" class="col-sm-2 col-form-label">Repeat Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="new_password2" name="new_password2">
                <?= form_error('new_password2', '<small class="text-danger" role="alert">', '</small>'); ?>
            </div>
        </div>

        <div class="form-group pl-3">
            <button type="submit" class="btn btn-primary">Change</button>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->