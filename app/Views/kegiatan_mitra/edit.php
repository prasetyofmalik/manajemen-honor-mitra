<?php

use App\Helpers\UrlHelper; ?>
<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Edit Kegiatan Mitra</h4>
            <p class="text-muted small mb-0">Perbarui penugasan atau rincian pembayaran untuk mitra terpilih.</p>
        </div>
        <div class="col-auto">
            <a href="<?= UrlHelper::url('kegiatan-mitra') ?>" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-10">
            <form action="<?= UrlHelper::url('kegiatan-mitra/update/' . $kegiatan_mitra['id']) ?>" method="post" class="card border-0 shadow-sm">
                <?= csrf_field() ?>

                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-warning-subtle text-warning rounded-circle p-2 me-3">
                            <i class="bi bi-person-gear fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Update Penugasan Mitra</h6>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pilih Mitra <span class="text-danger">*</span></label>
                            <select name="mitra_id" class="form-select select2-search" required>
                                <?php foreach ($mitra as $m): ?>
                                    <option value="<?= $m['id'] ?>" <?= $m['id'] == old('mitra_id', $kegiatan_mitra['mitra_id']) ? 'selected' : '' ?>>
                                        <?= esc($m['nama_lengkap']) ?> (ID: <?= esc($m['sobat_id']) ?>)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jabatan <span class="text-danger">*</span></label>
                            <select name="jabatan" class="form-select bg-light border-0 py-2" required>
                                <?php
                                $jabatan_opts = ['Pendata', 'Pengawas', 'Pengentri'];
                                foreach ($jabatan_opts as $opt): ?>
                                    <option value="<?= $opt ?>" <?= (old('jabatan', $kegiatan_mitra['jabatan'] ?? '') == $opt) ? 'selected' : '' ?>><?= $opt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Survei <span class="text-danger">*</span></label>
                            <select name="survei_id" id="surveiSelect" class="form-select select2-search" required>
                                <?php foreach ($survei as $s): ?>
                                    <option value="<?= $s['id'] ?>" <?= $s['id'] == old('survei_id', $survei_id) ? 'selected' : '' ?>>
                                        [<?= esc($s['kode_survei']) ?>] <?= esc($s['nama_survei']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jenis Kegiatan <span class="text-danger">*</span></label>
                            <select name="kegiatan_id" id="kegiatanSelect" class="form-select bg-light border-0 py-2" required>
                                <?php foreach ($kegiatan as $k): ?>
                                    <option value="<?= $k['id'] ?>" <?= $k['id'] == old('kegiatan_id', $kegiatan_mitra['kegiatan_id']) ? 'selected' : '' ?>>
                                        <?= esc($k['nama_kegiatan']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-success-subtle text-success rounded-circle p-2 me-3">
                            <i class="bi bi-cash-coin fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Update Rincian Pembayaran</h6>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Kegiatan</label>
                            <input type="month" name="bulan_kegiatan" class="form-control bg-light border-0 py-2" value="<?= esc(old('bulan_kegiatan', $kegiatan_mitra['bulan_kegiatan'])) ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Honor</label>
                            <input type="month" name="bulan_pembayaran_honor" class="form-control bg-light border-0 py-2" value="<?= esc(old('bulan_pembayaran_honor', $kegiatan_mitra['bulan_pembayaran_honor'])) ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Pulsa</label>
                            <input type="month" name="bulan_pembayaran_pulsa" class="form-control bg-light border-0 py-2" value="<?= esc(old('bulan_pembayaran_pulsa', $kegiatan_mitra['bulan_pembayaran_pulsa'])) ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Honor (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-secondary-subtle">Rp</span>
                                <input type="number" name="honor" class="form-control bg-light border-0 py-2" value="<?= esc(old('honor', $kegiatan_mitra['honor'])) ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pulsa (Rp)</label>
                            <div class="input-group">
                                <span class="input-group-text border-0 bg-secondary-subtle">Rp</span>
                                <input type="number" name="pulsa" class="form-control bg-light border-0 py-2" value="<?= esc(old('pulsa', $kegiatan_mitra['pulsa'])) ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-warning px-5 shadow-sm fw-bold">
                        <i class="bi bi-check-circle me-2"></i> Perbarui Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





<?= $this->endSection() ?>