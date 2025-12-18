<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h4 class="mb-4">Edit Survei</h4>

    <form action="/survei/update/<?= $survei['id'] ?>" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kode Survei</label>
                    <input type="text" name="kode_survei" class="form-control"
                        value="<?= esc($survei['kode_survei']) ?>" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Nama Survei</label>
                    <input type="text" name="nama_survei" class="form-control"
                        value="<?= esc($survei['nama_survei']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control"
                        value="<?= esc($survei['kegiatan']) ?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control"
                        value="<?= esc($survei['tanggal_mulai']) ?>" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control"
                        value="<?= esc($survei['tanggal_selesai']) ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Satuan</label>
                    <select name="satuan" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="DOK" <?= $survei['satuan'] == 'DOK' ? 'selected' : '' ?>>Dokumen</option>
                        <option value="O-B" <?= $survei['satuan'] == 'O-B' ? 'selected' : '' ?>>O-B</option>
                        <option value="BS" <?= $survei['satuan'] == 'BS' ? 'selected' : '' ?>>BS</option>
                        <option value="RUTA" <?= $survei['satuan'] == 'RUTA' ? 'selected' : '' ?>>Ruta</option>
                        <option value="EA" <?= $survei['satuan'] == 'EA' ? 'selected' : '' ?>>EA</option>
                        <option value="SGMN" <?= $survei['satuan'] == 'SGMN' ? 'selected' : '' ?>>Segmen</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control"
                        value="<?= esc($survei['harga_satuan']) ?>" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kode Beban Anggaran</label>
                    <input type="text" name="kode_beban_anggaran" class="form-control"
                        value="<?= esc($survei['kode_beban_anggaran']) ?>" required>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/survei" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-warning">
                <i class="bi bi-save"></i> Update
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>