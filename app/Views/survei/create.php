<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h4>Tambah Survei</h4>
        <small class="text-muted">
            Data survei bersifat induk. Kegiatan ditambahkan setelah survei dibuat.
        </small>
    </div>

    <form action="/survei/store" method="post" class="card shadow-sm">
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
                        placeholder="Contoh: SUSENAS26"
                        required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">
                        Nama Survei <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        name="nama_survei"
                        class="form-control"
                        placeholder="Survei Sosial Ekonomi Nasional (SUSENAS) Tahun 2026"
                        required>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/survei" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Survei
            </button>
        </div>
    </form>

</div>

<?= $this->endSection() ?>