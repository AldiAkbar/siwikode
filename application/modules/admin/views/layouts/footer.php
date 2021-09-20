            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIWIKODE <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/bootstrap/js/bootstrap.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?= base_url() ?>asset/vendor/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
            <!-- datatables -->
            <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <!-- SBADMIN2 -->
            <script src="<?= base_url() ?>asset/vendor/sbadmin2/js/sb-admin-2.min.js"></script>
            <!-- trix -->
            <script src="<?= base_url('asset/vendor/trix/trix.js') ?>"></script>
            <!-- sweetalert -->
            <script src="<?= base_url(); ?>asset/vendor/sweetalert2/sweetalert2.all.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();
                    $('#kategori').DataTable();
                });

                $('.custom-file-input').on('change', function() {
                    let filename = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(filename);
                });


                $('.form-check-input').on('input', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/Role/changeAccess?menuId='); ?>" + menuId + '&roleId=' + roleId,
                        type: 'get',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/Role/roleAccess/') ?>" + roleId;
                        }
                    });
                });

                const flashData = $('.flash-data').data('flashdata');
                let title = $('.flash-data').data('title');
                const kategori = $('.flashdata').data('kategori');
                let KategoriTitle = $('.flashdata').data('title');

                if (flashData == 'Login') {
                    Swal({
                        title: title,
                        text: flashData + ' Sukses',
                        type: 'success'
                    });
                } else if (flashData) {
                    Swal({
                        title: 'Data ' + title,
                        text: 'Berhasil ' + flashData,
                        type: 'success'
                    });
                } else if (kategori) {
                    Swal({
                        title: 'Data ' + KategoriTitle,
                        text: 'Berhasil ' + kategori,
                        type: 'success'
                    });
                }

                // tombol-hapus
                $('.tombol-hapus').on('click', function(e) {

                    e.preventDefault();
                    const href = $(this).attr('href');

                    Swal({
                        title: 'Apakah anda yakin?',
                        text: title + " akan dihapus",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Hapus'
                    }).then((result) => {
                        if (result.value) {
                            document.location.href = href;
                        }
                    })

                });
            </script>
            </body>

            </html>