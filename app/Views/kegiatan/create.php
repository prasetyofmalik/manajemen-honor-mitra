<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="mb-4">
        <h4>Tambah Kegiatan</h4>
        <small class="text-muted">
            Kegiatan untuk Survei:
            <strong><?= esc($survei['kode_survei']) ?> - <?= esc($survei['nama_survei']) ?></strong>
        </small>
    </div>

    <form action="/kegiatan/store" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <!-- hidden survei_id -->
        <input type="hidden" name="survei_id" value="<?= esc(old('survei_id', $survei['id'])) ?>">

        <div class="card-body">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Nama Kegiatan <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        name="nama_kegiatan"
                        class="form-control"
                        placeholder="Contoh: Pendataan - Semester I"
                        value="<?= esc(old('nama_kegiatan')) ?>"
                        required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">
                        Tanggal Mulai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                        name="tanggal_mulai"
                        class="form-control"
                        value="<?= esc(old('tanggal_mulai')) ?>"
                        required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">
                        Tanggal Selesai <span class="text-danger">*</span>
                    </label>
                    <input type="date"
                        name="tanggal_selesai"
                        class="form-control"
                        value="<?= esc(old('tanggal_selesai')) ?>"
                        required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Satuan <span class="text-danger">*</span>
                    </label>
                    <select name="satuan" class="form-select" required>
                        <option value="">-- Pilih Satuan --</option>
                        <option value="DOK" <?= old('satuan') == 'DOK' ? 'selected' : '' ?>>Dokumen</option>
                        <option value="O-B" <?= old('satuan') == 'O-B' ? 'selected' : '' ?>>O-B</option>
                        <option value="BS" <?= old('satuan') == 'BS' ? 'selected' : '' ?>>BS</option>
                        <option value="RUTA" <?= old('satuan') == 'RUTA' ? 'selected' : '' ?>>Ruta</option>
                        <option value="EA" <?= old('satuan') == 'EA' ? 'selected' : '' ?>>EA</option>
                        <option value="SGMN" <?= old('satuan') == 'SGMN' ? 'selected' : '' ?>>Segmen</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Harga Satuan <span class="text-danger">*</span>
                    </label>
                    <input type="number"
                        name="harga_satuan"
                        class="form-control"
                        placeholder="Contoh: 100000"
                        value="<?= esc(old('harga_satuan')) ?>"
                        required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">
                        Kode Beban Anggaran <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                        name="kode_beban_anggaran"
                        class="form-control"
                        value="<?= esc(old('kode_beban_anggaran')) ?>"
                        placeholder="Contoh: 2898.BMA.007.005.A.521213"
                        required>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/survei" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Kegiatan
            </button>
        </div>
    </form>

</div>

<?= $this->endSection() ?>