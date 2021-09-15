<div class="container">
    <div class="row">
        <p style="display: none;"><?= $title; ?></p>
        <div class="col">
            <h2 class="text-center"><?= $rekreasi['name'] ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="<?= base_url('admin/rekreasi') ?>" class="btn btn-success"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <a href="<?= base_url('admin/rekreasi/edit/' . $rekreasi['slug']); ?>" class="btn btn-warning ml-2"><i class="fas fa-fw fa-pen"></i> Edit</a>
            <a href="<?= base_url('admin/rekreasi/delete/' . $rekreasi['id']); ?>" class="btn btn-danger ml-2"><i class="fas fa-fw fa-trash"></i> Delete</a>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <img src="<?= base_url('asset/img/rekreasi/') . $rekreasi['image']; ?>" alt="<?= $rekreasi['slug'] ?>" class="my-3">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" style="font-size: 17px;">
            <?= $rekreasi['deskripsi'] ?>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <li>
                    <p><strong>Alamat: </strong> <?= $rekreasi['address'] ?> </p>
                </li>
                <li>
                    <p><strong>Fasilitas: </strong> <?= $rekreasi['facility'] ?></p>
                </li>
                <li>
                    <p><strong>Tiket Masuk: </strong> <?= $rekreasi['ticket'] ?></p>
                </li>
                <li>
                    <p><strong>Jam Buka: </strong> <?= $rekreasi['time_open'] ?></p>
                </li>
            </ul>
        </div>
    </div>
</div>