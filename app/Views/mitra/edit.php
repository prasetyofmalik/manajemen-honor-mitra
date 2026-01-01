<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Edit Mitra</h4>
            <p class="text-muted small mb-0">Perbarui informasi profil dan detail rekening mitra.</p>
        </div>
        <div class="col-auto">
            <a href="/mitra" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-10">
            <form action="/mitra/update/<?= $mitra['id'] ?>" method="post" class="card border-0 shadow-sm">
                <?= csrf_field() ?>

                <div class="card-body p-4">

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary-subtle text-primary rounded-circle p-2 me-3">
                            <i class="bi bi-person-badge fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Informasi Pribadi & Pekerjaan</h6>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">SOBAT ID <span class="text-danger">*</span></label>
                            <input type="text" name="sobat_id" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['sobat_id']) ?>" required>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['nama_lengkap']) ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Posisi <span class="text-danger">*</span></label>
                            <select name="posisi" class="form-select bg-light border-0 py-2" required>
                                <?php $posisi_opts = ['Mitra Pendataan', 'Mitra Pengolahan', 'Mitra (Pendataan dan Pengolahan)']; ?>
                                <?php foreach ($posisi_opts as $opt): ?>
                                    <option value="<?= $opt ?>" <?= $mitra['posisi'] == $opt ? 'selected' : '' ?>><?= $opt ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jk" class="form-select bg-light border-0 py-2" required>
                                <option value="Lk" <?= $mitra['jk'] == 'Lk' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Pr" <?= $mitra['jk'] == 'Pr' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pendidikan <span class="text-danger">*</span></label>
                            <select name="pendidikan" class="form-select bg-light border-0 py-2" required>
                                <?php $edu_opts = ['SMA' => 'Tamat SMA/Sederajat', 'D1/D2/D3' => 'Tamat D1/D2/D3', 'D4/S1' => 'Tamat D4/S1', 'S2' => 'Tamat S2']; ?>
                                <?php foreach ($edu_opts as $val => $label): ?>
                                    <option value="<?= $val ?>" <?= $mitra['pendidikan'] == $val ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan" class="form-select bg-light border-0 py-2" required>
                                <?php
                                $job_opts = [
                                    "(1) Aparat Desa / Kelurahan" => "Aparat Desa / Kelurahan",
                                    "(2) Kader PKK / Karang Taruna / Kader Lainnya" => "Kader PKK / Karang Taruna / Kader Lainnya",
                                    "(3) Pegawai / Guru Honorer" => "Pegawai / Guru Honorer",
                                    "(4) Mengurus Rumah Tangga" => "Mengurus Rumah Tangga",
                                    "(5) Wiraswasta" => "Wiraswasta",
                                    "(6) Pelajar / Mahasiswa" => "Pelajar / Mahasiswa",
                                    "(7) Lainnya" => "Lainnya"
                                ];
                                foreach ($job_opts as $val => $label): ?>
                                    <option value="<?= $val ?>" <?= $mitra['pekerjaan'] == $val ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['nik']) ?>" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">No Telepon <span class="text-danger">*</span></label>
                            <input type="text" id="phone_input" name="no_telp" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['no_telp']) ?>" maxlength="18" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['email']) ?>" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Alamat Tinggal</label>
                            <textarea name="alamat" rows="2" class="form-control bg-light border-0 py-2"><?= esc($mitra['alamat']) ?></textarea>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-warning-subtle text-warning rounded-circle p-2 me-3">
                            <i class="bi bi-credit-card fs-5"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Informasi Rekening Bank</h6>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Nama Bank</label>
                            <select name="nama_bank" class="form-select bg-light border-0 py-2">
                                <option value="">-- Pilih Bank --</option>
                                <?php
                                $bank_opts = [
                                    "(002) BANK BRI" => "BANK BRI",
                                    "(008) BANK MANDIRI" => "BANK MANDIRI",
                                    "(009) BANK BNI" => "BANK BNI",
                                    "(014) BANK BCA" => "BANK BCA",
                                    "(119) BANK RIAU" => "BANK RIAU",
                                    "(451) BANK SYARIAH INDONESIA" => "BANK SYARIAH INDONESIA",
                                    "(535) Sea Bank" => "Sea Bank"
                                ];
                                foreach ($bank_opts as $val => $label): ?>
                                    <option value="<?= $val ?>" <?= $mitra['nama_bank'] == $val ? 'selected' : '' ?>><?= $label ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Nomor Rekening</label>
                            <input type="text" name="nomor_rekening" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['nomor_rekening']) ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Atas Nama</label>
                            <input type="text" name="rekening_nama" class="form-control bg-light border-0 py-2" value="<?= esc($mitra['rekening_nama']) ?>">
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-warning px-5 shadow-sm fw-medium">
                        <i class="bi bi-check-circle me-2"></i> Perbarui Data Mitra
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





<?= $this->endSection() ?>