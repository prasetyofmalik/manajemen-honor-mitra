<!DOCTYPE html>
<html>

<head>
    <title>Tambah Survei</title>
</head>

<body>

    <h2>Tambah Survei</h2>

    <form action="/survei/store" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Kode Survei</label>
            <input type="text" name="kode_survei" required>
        </p>

        <p></p>
        <label>Nama Survei</label>
        <input type="text" name="nama_survei" required>
        </p>

        <p>
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" required>
        </p>

        <p>
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" required>
        </p>

        <p>
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" required>
        </p>

        <p>
            <label>Satuan</label>
            <input type="text" name="satuan" required>
        </p>

        <p>
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan" required>
        </p>

        <p>
            <label>Kode Beban Anggaran</label>
            <input type="text" name="kode_beban_anggaran" required>
        </p>

        <button type="submit">Simpan</button>
        <a href="/survei">Kembali</a>
    </form>

</body>

</html>