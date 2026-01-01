<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Edit Kegiatan</h4>
            <p class="text-muted small mb-0">
                Memperbarui rincian untuk survei:
                <span class="badge bg-primary-subtle text-primary fw-semibold ms-1">
                    <?= esc($survei['kode_survei']) ?> - <?= esc($survei['nama_survei']) ?>
                </span>
            </p>
        </div>
        <div class="col-auto">
            <a href="/survei" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-10">
            <form action="/kegiatan/update/<?= $kegiatan['id'] ?>" method="post" class="card border-0 shadow-sm">
                <?= csrf_field() ?>

                <input type="hidden" name="survei_id" value="<?= esc(old('survei_id', $survei['id'])) ?>">

                <div class="card-body p-4">
                    <div class="row g-4">

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Nama Kegiatan <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                name="nama_kegiatan"
                                class="form-control bg-light border-0 py-2"
                                value="<?= esc(old('nama_kegiatan', $kegiatan['nama_kegiatan'])) ?>"
                                placeholder="Contoh: Pendataan Lapangan"
                                required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Tanggal Mulai <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                name="tanggal_mulai"
                                class="form-control bg-light border-0 py-2"
                                value="<?= esc(old('tanggal_mulai', $kegiatan['tanggal_mulai'])) ?>"
                                required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Tanggal Selesai <span class="text-danger">*</span>
                            </label>
                            <input type="date"
                                name="tanggal_selesai"
                                class="form-control bg-light border-0 py-2"
                                value="<?= esc(old('tanggal_selesai', $kegiatan['tanggal_selesai'])) ?>"
                                required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Satuan <span class="text-danger">*</span>
                            </label>
                            <select name="satuan" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih --</option>
                                <?php
                                $options = ['DOK' => 'Dokumen', 'O-B' => 'O-B', 'BS' => 'BS', 'RUTA' => 'Ruta', 'EA' => 'EA', 'SGMN' => 'Segmen'];
                                foreach ($options as $val => $label):
                                ?>
                                    <option value="<?= $val ?>" <?= old('satuan', $kegiatan['satuan']) == $val ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Harga Satuan <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0 text-muted small fw-bold">Rp</span>
                                <input type="number"
                                    name="harga_satuan"
                                    class="form-control bg-light border-0 py-2"
                                    value="<?= esc(old('harga_satuan', $kegiatan['harga_satuan'])) ?>"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Kode Beban Anggaran <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                name="kode_beban_anggaran"
                                class="form-control bg-light border-0 py-2 text-uppercase"
                                value="<?= esc(old('kode_beban_anggaran', $kegiatan['kode_beban_anggaran'])) ?>"
                                placeholder="Contoh: 2906.BMA.006..."
                                required>
                        </div>

                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-warning px-5 shadow-sm fw-medium">
                        <i class="bi bi-check-circle me-2"></i> Perbarui Kegiatan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>



<?= $this->endSection() ?>