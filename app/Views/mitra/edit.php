<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h4 class="mb-4">Edit Mitra</h4>

    <form action="/mitra/update/<?= $mitra['id'] ?>" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">SOBAT ID</label>
                    <input type="text" name="sobat_id" class="form-control"
                        value="<?= esc($mitra['sobat_id']) ?>" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control"
                        value="<?= esc($mitra['nama_lengkap']) ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Posisi</label>
                    <input type="text" name="posisi" class="form-control"
                        value="<?= esc($mitra['posisi']) ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Lk" <?= $mitra['jk'] == 'Lk' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="Pr" <?= $mitra['jk'] == 'Pr' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Pendidikan</label>
                    <input type="text" name="pendidikan" class="form-control"
                        value="<?= esc($mitra['pendidikan']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <input type="text" name="pekerjaan" class="form-control"
                        value="<?= esc($mitra['pekerjaan']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control"
                        value="<?= esc($mitra['no_telp']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                        value="<?= esc($mitra['email']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control"
                        value="<?= esc($mitra['nik']) ?>" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control"><?= esc($mitra['alamat']) ?></textarea>
                </div>

                <hr class="my-3">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-control"
                        value="<?= esc($mitra['nama_bank']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control"
                        value="<?= esc($mitra['nomor_rekening']) ?>">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Atas Nama</label>
                    <input type="text" name="rekening_nama" class="form-control"
                        value="<?= esc($mitra['rekening_nama']) ?>">
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/mitra" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-pencil-square"></i> Update
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>