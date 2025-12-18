<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Input Kegiatan Mitra</h4>
        <a href="/kegiatan-mitra" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="/kegiatan-mitra/store" method="post">
                <?= csrf_field() ?>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Mitra</label>
                        <select name="mitra_id" class="form-select" required>
                            <option value="">-- Pilih Mitra --</option>
                            <?php foreach ($mitra as $m): ?>
                                <option value="<?= $m['id'] ?>">
                                    <?= esc($m['nama_lengkap']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Survei</label>
                        <select name="survei_id" id="surveiSelect" class="form-select" required>
                            <option value="">-- Pilih Survei --</option>
                            <?php foreach ($survei as $s): ?>
                                <option value="<?= $s['id'] ?>">
                                    <?= esc($s['kode_survei']) ?> - <?= esc($s['nama_survei']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Kegiatan Mitra</label>
                        <select name="kegiatan" id="kegiatanSelect"
                            class="form-select"
                            disabled
                            required>
                            <option value="">-- Pilih Survei terlebih dahulu --</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bulan Kegiatan</label>
                        <input type="month" name="bulan_kegiatan"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bulan Pembayaran Honor</label>
                        <input type="month" name="bulan_pembayaran_honor"
                            class="form-control"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bulan Pembayaran Pulsa</label>
                        <input type="month" name="bulan_pembayaran_pulsa"
                            class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Honor (Rp)</label>
                        <input type="number" name="honor"
                            class="form-control"
                            placeholder="0"
                            min="0"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pulsa (Rp)</label>
                        <input type="number" name="pulsa"
                            class="form-control"
                            placeholder="0"
                            min="0">
                    </div>

                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                    <a href="/kegiatan-mitra" class="btn btn-outline-secondary">
                        Batal
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>