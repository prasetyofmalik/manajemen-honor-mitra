<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Edit Kegiatan Mitra</h4>
        <a href="/kegiatan-mitra" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="/kegiatan-mitra/update/<?= $kegiatan_mitra['id'] ?>" method="post">
                <?= csrf_field() ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mitra</label>
                        <select name="mitra_id" class="form-select" required>
                            <?php foreach ($mitra as $m): ?>
                                <option value="<?= $m['id'] ?>"
                                    <?= $m['id'] == old('mitra_id', $kegiatan_mitra['mitra_id']) ? 'selected' : '' ?>>
                                    <?= esc($m['nama_lengkap']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Survei</label>
                        <select name="survei_id" id="surveiSelect" class="form-select" required>
                            <?php foreach ($survei as $s): ?>
                                <option value="<?= $s['id'] ?>"
                                    <?= $s['id'] == old('survei_id', $survei_id) ? 'selected' : '' ?>>
                                    <?= esc($s['kode_survei']) ?> - <?= esc($s['nama_survei'] ?? '') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kegiatan</label>
                    <select name="kegiatan_id" id="kegiatanSelect" class="form-select" required>
                        <option value="">-- Pilih Kegiatan --</option>
                        <?php foreach ($kegiatan as $k): ?>
                            <option value="<?= $k['id'] ?>"
                                <?= $k['id'] == old('kegiatan_id', $kegiatan_mitra['kegiatan_id']) ? 'selected' : '' ?>>
                                <?= esc($k['nama_kegiatan']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Bulan Kegiatan</label>
                        <input type="month"
                            name="bulan_kegiatan"
                            class="form-control"
                            value="<?= esc(old('bulan_kegiatan', $kegiatan_mitra['bulan_kegiatan'])) ?>"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bulan Pembayaran Honor</label>
                        <input type="month"
                            name="bulan_pembayaran_honor"
                            class="form-control"
                            value="<?= esc(old('bulan_pembayaran_honor', $kegiatan_mitra['bulan_pembayaran_honor'])) ?>"
                            required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Bulan Pembayaran Pulsa</label>
                        <input type="month"
                            name="bulan_pembayaran_pulsa"
                            class="form-control"
                            value="<?= esc(old('bulan_pembayaran_pulsa', $kegiatan_mitra['bulan_pembayaran_pulsa'])) ?>"
                            required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Honor (Rp)</label>
                        <input type="number"
                            name="honor"
                            class="form-control"
                            value="<?= esc(old('honor', $kegiatan_mitra['honor'])) ?>"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pulsa (Rp)</label>
                        <input type="number"
                            name="pulsa"
                            class="form-control"
                            value="<?= esc(old('pulsa', $kegiatan_mitra['pulsa'])) ?>"
                            required>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="/kegiatan-mitra" class="btn btn-outline-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save"></i> Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

<!-- SCRIPT FILTER KEGIATAN BERDASARKAN SURVEI -->
<script>
    document.getElementById('surveiSelect').addEventListener('change', function() {
        const surveiId = this.value;
        const kegiatanSelect = document.getElementById('kegiatanSelect');

        kegiatanSelect.innerHTML = '';

        if (!surveiId) {
            kegiatanSelect.innerHTML = '<option value="">-- Pilih survei terlebih dahulu --</option>';
            return;
        }

        kegiatanSelect.innerHTML = '<option value="">Memuat kegiatan...</option>';

        fetch(`/kegiatan/by-survei/${surveiId}`)
            .then(response => response.json())
            .then(data => {
                kegiatanSelect.innerHTML = '';

                if (data.length === 0) {
                    kegiatanSelect.innerHTML =
                        '<option value="">Belum ada kegiatan untuk survei ini</option>';
                    return;
                }

                kegiatanSelect.innerHTML =
                    '<option value="">-- Pilih Kegiatan --</option>';

                data.forEach(kegiatan => {
                    const option = document.createElement('option');
                    option.value = kegiatan.id;
                    option.textContent = kegiatan.nama_kegiatan;
                    kegiatanSelect.appendChild(option);
                });
            })
            .catch(() => {
                kegiatanSelect.innerHTML =
                    '<option value="">Gagal memuat kegiatan</option>';
            });
    });
</script>

<?= $this->endSection() ?>