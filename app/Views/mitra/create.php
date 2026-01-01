<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Tambah Mitra</h4>
            <p class="text-muted small mb-0">Lengkapi formulir di bawah untuk menambahkan Mitra Kepka 2026 yang belum masuk</p>
        </div>
        <div class="col-auto">
            <a href="/mitra" class="btn btn-outline-secondary px-4 border-0">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="row justify-content-start">
        <div class="col-lg-10">
            <form action="/mitra/store" method="post" class="card border-0 shadow-sm">
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
                            <input type="text" name="sobat_id" class="form-control bg-light border-0 py-2" placeholder="Masukkan ID" required>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="nama_lengkap" class="form-control bg-light border-0 py-2" placeholder="Sesuai KTP" required>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Posisi <span class="text-danger">*</span></label>
                            <select name="posisi" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Mitra Pendataan">Mitra Pendataan</option>
                                <option value="Mitra Pengolahan">Mitra Pengolahan</option>
                                <option value="Mitra (Pendataan dan Pengolahan)">Mitra (Pendataan dan Pengolahan)</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jk" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih --</option>
                                <option value="Lk">Laki-laki</option>
                                <option value="Pr">Perempuan</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pendidikan <span class="text-danger">*</span></label>
                            <select name="pendidikan" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih --</option>
                                <option value="SMA">Tamat SMA/Sederajat</option>
                                <option value="D1/D2/D3">Tamat D1/D2/D3</option>
                                <option value="D4/S1">Tamat D4/S1</option>
                                <option value="S2">Tamat S2</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Pekerjaan <span class="text-danger">*</span></label>
                            <select name="pekerjaan" class="form-select bg-light border-0 py-2" required>
                                <option value="" hidden>-- Pilih Pekerjaan --</option>
                                <option value="(1) Aparat Desa / Kelurahan">Aparat Desa / Kelurahan</option>
                                <option value="(2) Kader PKK / Karang Taruna / Kader Lainnya">Kader PKK / Karang Taruna / Kader Lainnya</option>
                                <option value="(3) Pegawai / Guru Honorer">Pegawai / Guru Honorer</option>
                                <option value="(4) Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
                                <option value="(5) Wiraswasta">Wiraswasta</option>
                                <option value="(6) Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
                                <option value="(7) Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">NIK <span class="text-danger">*</span></label>
                            <input type="text" name="nik" class="form-control bg-light border-0 py-2" placeholder="16 Digit NIK" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">No Telepon <span class="text-danger">*</span></label>
                            <input type="text"
                                id="phone_input"
                                name="no_telp"
                                class="form-control bg-light border-0 py-2"
                                placeholder="+62 812-3456-78901"
                                maxlength="18"
                                required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control bg-light border-0 py-2" placeholder="alamat@email.com" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Alamat Tinggal</label>
                            <textarea name="alamat" rows="2" class="form-control bg-light border-0 py-2" placeholder="Nama Jalan, Blok, No Rumah, Kelurahan, Kecamatan"></textarea>
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
                                <option value="" hidden>-- Pilih Bank --</option>
                                <option value="(002) BANK BRI">BANK BRI</option>
                                <option value="(008) BANK MANDIRI">BANK MANDIRI</option>
                                <option value="(009) BANK BNI">BANK BNI</option>
                                <option value="(014) BANK BCA">BANK BCA</option>
                                <option value="(119) BANK RIAU">BANK RIAU</option>
                                <option value="(451) BANK SYARIAH INDONESIA">BANK SYARIAH INDONESIA</option>
                                <option value="(535) Sea Bank">Sea Bank</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Nomor Rekening</label>
                            <input type="text" name="nomor_rekening" class="form-control bg-light border-0 py-2" placeholder="0000000000">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label small fw-bold text-uppercase text-secondary">Atas Nama</label>
                            <input type="text" name="rekening_nama" class="form-control bg-light border-0 py-2" placeholder="Sesuai di Buku Tabungan">
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white border-top-0 p-4 pt-0 text-end">
                    <hr class="text-light mb-4">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">
                        <i class="bi bi-save me-2"></i> Simpan Data Mitra
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>





<?= $this->endSection() ?>