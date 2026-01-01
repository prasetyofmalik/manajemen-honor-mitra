<?php

use App\Helpers\UrlHelper; ?>
<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Tambah Survei</h4>
            <p class="text-muted small mb-0">
                Data survei bersifat induk. Kegiatan dapat ditambahkan setelah data induk tersimpan.
            </p>
        </div>
        <div class="col-auto">
            <a href="<?= UrlHelper::url('survei') ?>" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-8">
            <form action="<?= UrlHelper::url('survei/store') ?>" method="post" class="card border-0 shadow-sm">
                <?= csrf_field() ?>

                <div class="card-body p-4">
                    <div class="row g-4">

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Kode Survei <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                name="kode_survei"
                                class="form-control bg-light border-0 py-2"
                                placeholder="MISAL: SUSENAS26"
                                style="text-transform: uppercase;"
                                required>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-uppercase text-secondary">
                                Nama Survei <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                name="nama_survei"
                                class="form-control bg-light border-0 py-2"
                                placeholder="Survei Sosial Ekonomi Nasional Tahun 2026"
                                required>
                        </div>

                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">
                        <i class="bi bi-save me-2"></i> Simpan Data Survei
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>



<?= $this->endSection() ?>