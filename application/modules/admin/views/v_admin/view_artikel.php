<div class="container">
    <div class="row my-3">
        <p style="display: none;"><?= $title; ?></p>
        <div class="col">
            <h2><?= $artikel['title'] ?></h2>
            <a href="<?= base_url('admin/artikel') ?>" class="btn btn-success"><i class="fas fa-fw fa-arrow-left"></i> Back</a>
            <a href="<?= base_url('admin/artikel/edit/' . $artikel['slug']); ?>" class="btn btn-warning"><i class="fas fa-fw fa-pen"></i> Edit</a>
            <a href="<?= base_url('admin/artikel/delete/' . $artikel['id']); ?>" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Delete</a>
            <div class="col d-flex justify-content-center">
                <img src="<?= base_url('asset/img/artikel/') . $artikel['image']; ?>" alt="<?= $artikel['slug'] ?>" class="my-3">
            </div>
            <article>
                <?= $artikel['detail_artikel'] ?>
            </article>
        </div>
    </div>
</div>