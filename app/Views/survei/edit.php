<!DOCTYPE html>
<html>

<head>
    <title>Edit Survei</title>
</head>

<body>

    <h2>Edit Survei</h2>

    <form action="/survei/update/<?= $survei['id'] ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>Kode Survei:</label><br>
            <input type="text" name="kode_survei" value="<?= esc($survei['kode_survei']) ?>" required>
        </p>
        <p>
            <label>Nama Survei:</label><br>
            <input type="text" name="nama_survei" value="<?= esc($survei['nama_survei']) ?>" required>
        </p>
        <p>
            <label>Kegiatan:</label><br>
            <input type="text" name="kegiatan" value="<?= esc($survei['kegiatan']) ?>" required>
        </p>
        <p>
            <label>Tanggal Mulai:</label><br>
            <input type="date" name="tanggal_mulai" value="<?= esc($survei['tanggal_mulai']) ?>" required>
        </p>
        <p>
            <label>Tanggal Selesai:</label><br>
            <input type="date" name="tanggal_selesai" value="<?= esc($survei['tanggal_selesai']) ?>" required>
        </p>
        <p>
            <label>Satuan:</label><br>
            <input type="text" name="satuan" value="<?= esc($survei['satuan']) ?>" required>
        </p>
        <p>
            <label>Harga Satuan:</label><br>
            <input type="number" name="harga_satuan" value="<?= esc($survei['harga_satuan']) ?>" required>
        </p>
        <p>
            <label>Kode Beban Anggaran:</label><br>
            <input type="text" name="kode_beban_anggaran" value="<?= esc($survei['kode_beban_anggaran']) ?>" required>
        </p>

        <button type="submit">Update</button>
        <a href="/survei">Kembali</a>
    </form>

</body>

</html>