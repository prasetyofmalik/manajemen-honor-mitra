<!DOCTYPE html>
<html>

<head>
    <title>Tambah Survei</title>
</head>

<body>

    <h2>Input Kegiatan Mitra</h2>

    <form action="/kegiatan-mitra/store" method="post">
        <?= csrf_field() ?>

        <p><label>Mitra</label><br>
        <select name="mitra_id">
            <?php foreach ($mitra as $m): ?>
                <option value="<?= $m['id'] ?>"><?= $m['nama_lengkap'] ?></option>
            <?php endforeach; ?>
        </select>
        </p>

        <p><label>Survei</label><br>
        <select name="survei_id">
            <?php foreach ($survei as $s): ?>
                <option value="<?= $s['id'] ?>"><?= $s['kode_survei'] ?></option>
            <?php endforeach; ?>
        </select>
        </p>

        <p>
            <label>Kegiatan Mitra</label><br>
            <input type="text" name="kegiatan" placeholder="Kegiatan">
        </p>

        <p>
            <label>Bulan Kegiatan</label><br>
            <input type="month" name="bulan_kegiatan">
        </p>
        <p>
            <label>Bulan Pembayaran Honor</label><br>
            <input type="month" name="bulan_pembayaran_honor">
        </p>
        <p>
            <label>Bulan Pembayaran Pulsa</label><br>
            <input type="month" name="bulan_pembayaran_pulsa">
        </p>
        <p>
            <label>Honor</label><br>
            <input type="number" name="honor">
        </p>
        <p>
            <label>Pulsa</label><br>
            <input type="number" name="pulsa">
        </p>
        <button type="submit">Simpan</button>
        <a href="/survei">Kembali</a>
    </form>
</body>

</html>