<!DOCTYPE html>
<html>

<head>
    <title>Tambah Survei</title>
</head>

<body>

    <h2>Input Kegiatan Mitra</h2>

    <form action="/kegiatan-mitra/store" method="post">
        <?= csrf_field() ?>

        <select name="mitra_id">
            <?php foreach ($mitra as $m): ?>
                <option value="<?= $m['id'] ?>"><?= $m['nama_lengkap'] ?></option>
            <?php endforeach; ?>
        </select>

        <select name="survei_id">
            <?php foreach ($survei as $s): ?>
                <option value="<?= $s['id'] ?>"><?= $s['kode_survei'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="text" name="kegiatan" placeholder="Kegiatan">
        <input type="month" name="bulan_kegiatan">
        <input type="month" name="bulan_pembayaran_honor">
        <input type="month" name="bulan_pembayaran_pulsa">
        <input type="number" name="honor">
        <input type="number" name="pulsa">

        <button type="submit">Simpan</button>
        <a href="/survei">Kembali</a>
    </form>
</body>

</html>