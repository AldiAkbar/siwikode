<div class="container">
    <div class="row">
        <p style="display: none;"><?= $title; ?></p>
        <div class="col">
            <h2 class="text-center"><?= $kuliner['name'] ?></h2>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="<?= base_url('admin/kuliner') ?>" class="btn btn-success"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <a href="<?= base_url('admin/kuliner/edit/' . $kuliner['slug']); ?>" class="btn btn-warning ml-2"><i class="fas fa-fw fa-pen"></i> Edit</a>
            <a href="<?= base_url('admin/kuliner/delete/' . $kuliner['id']); ?>" class="btn btn-danger ml-2"><i class="fas fa-fw fa-trash"></i> Delete</a>
        </div>
    </div>

    <div class="row">
        <div class="col d-flex justify-content-center">
            <img src="<?= base_url('asset/img/kuliner/') . $kuliner['image']; ?>" alt="<?= $kuliner['slug'] ?>" class="my-3">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" style="font-size: 17px;">
            <?= $kuliner['deskripsi'] ?>
        </div>
        <div class="col-md-6">
            <ul class="list-unstyled">
                <li>
                    <p><strong>Alamat</strong> : <?= $kuliner['address']; ?></p>
                </li>
                <li>
                    <p><strong>Menu</strong> : <?= $kuliner['menu']; ?></p>
                </li>
                <li>
                    <p><strong>Harga</strong> : <?= $kuliner['price']; ?></p>
                </li>
                <li>
                    <p><strong>Buka</strong> : <?= $kuliner['time_open']; ?></p>
                </li>
            </ul>
        </div>
    </div>
</div>