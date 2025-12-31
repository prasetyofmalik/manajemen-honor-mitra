<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Input Kegiatan Mitra</h4>
            <p class="text-muted small mb-0">Hubungkan mitra dengan kegiatan survei dan tentukan detail pembayaran.</p>
        </div>
        <div class="col-auto">
            <a href="/kegiatan-mitra" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-10">
            <form action="/kegiatan-mitra/store" method="post" class="card border-0 shadow-sm">
                <?= csrf_field() ?>

                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary-subtle text-primary rounded-circle p-2 me-3">
                            <i class="bi bi-people-fill fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Penugasan Mitra</h6>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pilih Mitra <span class="text-danger">*</span></label>
                            <select name="mitra_id" class="form-select select2-search" required>
                                <option value="">Cari Nama Mitra...</option>
                                <?php foreach ($mitra as $m): ?>
                                    <option value="<?= $m['id'] ?>">
                                        <?= esc($m['nama_lengkap']) ?> (ID: <?= esc($m['sobat_id']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jabatan dalam Kegiatan <span class="text-danger">*</span></label>
                            <select name="jabatan" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih Jabatan --</option>
                                <option value="Pendata">Pendata (PPL)</option>
                                <option value="Pengawas">Pengawas (PML)</option>
                                <option value="Pengentri">Pengentri</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Survei <span class="text-danger">*</span></label>
                            <select name="survei_id" id="surveiSelect" class="form-select select2-search" required>
                                <option value="">Cari Kode atau Nama Survei...</option>
                                <?php foreach ($survei as $s): ?>
                                    <option value="<?= $s['id'] ?>">
                                        [<?= esc($s['kode_survei']) ?>] <?= esc($s['nama_survei']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jenis Kegiatan <span class="text-danger">*</span></label>
                            <select name="kegiatan_id" id="kegiatanSelect" class="form-select bg-light border-0 py-2" disabled required>
                                <option value="">-- Pilih survei terlebih dahulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success-subtle text-success rounded-circle p-2 me-3">
                            <i class="bi bi-cash-stack fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Periode & Honorarium</h6>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Kegiatan</label>
                            <input type="month" name="bulan_kegiatan" class="form-control bg-light border-0 py-2" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Honor</label>
                            <input type="month" name="bulan_pembayaran_honor" class="form-control bg-light border-0 py-2" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Pulsa</label>
                            <input type="month" name="bulan_pembayaran_pulsa" class="form-control bg-light border-0 py-2">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Honor (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-secondary-subtle">Rp</span>
                                <input type="number" name="honor" class="form-control bg-light border-0 py-2" min="0" placeholder="0" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pulsa (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-secondary-subtle">Rp</span>
                                <input type="number" name="pulsa" class="form-control bg-light border-0 py-2" min="0" placeholder="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">
                        <i class="bi bi-save me-2"></i> Simpan Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Searchable Select2
        $('.select2-search').select2({
            theme: 'bootstrap-5',
            width: '100%'
        });

        // Activity Filter Logic
        $('#surveiSelect').on('change', function() {
            const surveiId = $(this).val();
            const $kegiatanSelect = $('#kegiatanSelect');

            $kegiatanSelect.html('<option value="">Memuat kegiatan...</option>').prop('disabled', true);

            if (!surveiId) {
                $kegiatanSelect.html('<option value="">-- Pilih survei terlebih dahulu --</option>');
                return;
            }

            fetch(`/kegiatan/by-survei/${surveiId}`)
                .then(response => response.json())
                .then(data => {
                    $kegiatanSelect.html('');
                    if (data.length === 0) {
                        $kegiatanSelect.html('<option value="">Belum ada kegiatan untuk survei ini</option>');
                    } else {
                        $kegiatanSelect.append('<option value="">-- Pilih Kegiatan --</option>');
                        data.forEach(kegiatan => {
                            $kegiatanSelect.append(`<option value="${kegiatan.id}">${kegiatan.nama_kegiatan}</option>`);
                        });
                        $kegiatanSelect.prop('disabled', false);
                    }
                })
                .catch(() => {
                    $kegiatanSelect.html('<option value="">Gagal memuat kegiatan</option>');
                });
        });
    });
</script>

<style>
    .select2-container--bootstrap-5 .select2-selection {
        background-color: #f8f9fa !important;
        border: none !important;
        padding: 0.4rem;
    }

    .form-control:focus {
        background-color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        border: 1px solid #0d6efd;
    }
</style>

<?= $this->endSection() ?>