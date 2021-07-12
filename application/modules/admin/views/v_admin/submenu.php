
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
                            <a href="" class="btn btn-primary mb-4 add-button" data-toggle="modal" data-target="#formModal" >Add New Submenu</a>

                            <table id="example" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Active</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title'];  ?></td>
                                        <td><?= $sm['menu'];  ?></td>
                                        <td><?= $sm['url'];  ?></td>
                                        <td><?= $sm['icon'];  ?></td>
                                        <td><?= $sm['is_active'];  ?></td>
                                        <td>
                                            <a href="" class="badge badge-success btn-edit" data-toggle="modal" data-target="#formEditModal<?= $sm['id']; ?>">Edit</a>
                                            <a href="<?= base_url('admin/subMenu/deleteSubMenu/'.$sm['id']); ?>" class="badge badge-danger" onclick="return confirm('Are you sure want to delete this?')">Delete</a>
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
                <h5 class="modal-title" id="formModalLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/submenu'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title"><strong>Title: </strong> </label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Ttile">
                        </div>
                        <div class="form-group">
                            <label for="menu_id"><strong>Menu: </strong> </label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url"><strong>URL: </strong> </label>
                            <input type="text" class="form-control" id="url" name="url" placeholder="url menu">
                        </div>
                        <div class="form-group">
                            <label for="icon"><strong>Icon Menu: </strong> </label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="icon menu">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active"><strong> Active? </strong> </label>
                            </div>
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

    <!-- modal edit -->
    <?php foreach($subMenu as $sm) : ?>
    <div class="modal fade" id="formEditModal<?= $sm['id']; ?>" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('admin/submenu/editSubMenu'); ?>" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="<?= $sm['id']; ?>">
                        <div class="form-group">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                        </div>
                        <div class="form-group">
                            <label for="title"><strong>Title: </strong> </label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="menu_id"><strong>Menu: </strong> </label>
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach($menu as $m) : ?>
                                    <?php if($m['id'] == $sm['menu_id']) : ?>
                                        <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url"><strong>URL: </strong> </label>
                            <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="icon"><strong>Icon Menu: </strong> </label>
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active"><strong> Active? </strong> </label>
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

    <script type="text/javascript">
    $(ducument).ready(function() {

        $('.btn-edit').click( function() {
            let id = $(this).attr('id');
            console.log(id);
        });
    });
    </script>