<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h4 class="mb-4">Tambah Mitra</h4>

    <form action="/mitra/store" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">SOBAT ID</label>
                    <input type="text" name="sobat_id" class="form-control" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Posisi</label>
                    <select name="posisi" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Mitra Pendataan">Mitra Pendataan</option>
                        <option value="Mitra Pengolahan">Mitra Pengolahan</option>
                        <option value="Mitra (Pendataan dan Pengolahan)">Mitra (Pendataan dan Pengolahan)</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jk" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Lk">Laki-laki</option>
                        <option value="Pr">Perempuan</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Pendidikan</label>
                    <select name="pendidikan" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="SMA">Tamat SMA/Sederajat</option>
                        <option value="D1/D2/D3">Tamat D1/D2/D3</option>
                        <option value="D4/S1">Tamat D4/S1</option>
                        <option value="S2">Tamat S2</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Pekerjaan</label>
                    <select name="pekerjaan" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="(1) Aparat Desa / Kelurahan">(1) Aparat Desa / Kelurahan</option>
                        <option value="(2) Kader PKK / Karang Taruna / Kader Lainnya">(2) Kader PKK / Karang Taruna / Kader Lainnya</option>
                        <option value="(3) Pegawai / Guru Honorer">(3) Pegawai / Guru Honorer</option>
                        <option value="(4) Mengurus Rumah Tangga">(4) Mengurus Rumah Tangga</option>
                        <option value="(5) Wiraswasta">(5) Wiraswasta</option>
                        <option value="(6) Pelajar / Mahasiswa">(6) Pelajar / Mahasiswa</option>
                        <option value="(7) Lainnya">(7) Lainnya</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">NIK</label>
                    <input type="text" name="nik" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="3" class="form-control"></textarea>
                </div>

                <hr class="my-3">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Nama Bank</label>
                    <input type="text" name="nama_bank" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Nomor Rekening</label>
                    <input type="text" name="nomor_rekening" class="form-control">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Atas Nama</label>
                    <input type="text" name="rekening_nama" class="form-control">
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/mitra" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>