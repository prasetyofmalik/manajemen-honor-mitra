<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <h4 class="mb-4">Tambah Survei</h4>

    <form action="/survei/store" method="post" class="card shadow-sm">
        <?= csrf_field() ?>

        <div class="card-body">
            <div class="row">

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kode Survei</label>
                    <input type="text" name="kode_survei" class="form-control" required>
                </div>

                <div class="col-md-8 mb-3">
                    <label class="form-label">Nama Survei</label>
                    <input type="text" name="nama_survei" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kegiatan</label>
                    <input type="text" name="kegiatan" class="form-control" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Satuan</label>
                    <select name="satuan" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="DOK">Dokumen</option>
                        <option value="O-B">O-B</option>
                        <option value="BS">BS</option>
                        <option value="RUTA">Ruta</option>
                        <option value="EA">EA</option>
                        <option value="SGMN">Segmen</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Harga Satuan</label>
                    <input type="number" name="harga_satuan" class="form-control" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Kode Beban Anggaran</label>
                    <input type="text" name="kode_beban_anggaran" class="form-control" required>
                </div>

            </div>
        </div>

        <div class="card-footer text-end">
            <a href="/survei" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>