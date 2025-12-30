<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h4>Edit Survei</h4>
        <small class="text-muted">
            Ubah data dasar survei (kode dan nama)
        </small>
    </div>

    <form action="/survei/update/<?= $survei['id'] ?>" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Kode Survei <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        name="kode_survei"
                        class="form-control"
                        value="<?= esc($survei['kode_survei']) ?>"
                        required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">
                        Nama Survei <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        name="nama_survei"
                        class="form-control"
                        value="<?= esc($survei['nama_survei']) ?>"
                        required>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/survei" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-save"></i> Update Survei
            </button>
        </div>
    </form>

</div>

<?= $this->endSection() ?>