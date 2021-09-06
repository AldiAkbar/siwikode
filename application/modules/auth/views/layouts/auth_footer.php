    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>asset/vendor/sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- SBADMIN2-->
    <script src="<?= base_url() ?>asset/vendor/sbadmin2/js/sb-admin-2.min.js"></script>
    <!-- sweetalert -->
    <script src="<?= base_url(); ?>asset/vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script>
        const flashData = $('.flash-data').data('flashdata');
        let title = $('.flash-data').data('title');

        if (flashData) {
            Swal({
                title: title,
                text: 'Berhasil ' + flashData,
                type: 'success'
            });
        }

        // tombol-hapus
        $('.tombol-hapus').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            Swal({
                title: 'Apakah anda yakin',
                text: "data mahasiswa akan dihapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.value) {
                    document.location.href = href;
                }
            })

        });
    </script>

    </body>

    </html>