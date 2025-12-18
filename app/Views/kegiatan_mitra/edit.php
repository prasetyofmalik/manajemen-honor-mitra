<!DOCTYPE html>
<html>

<head>
    <title>Edit Kegiatan Mitra</title>
</head>

<body>

    <h2>Edit Kegiatan Mitra</h2>

    <form action="/kegiatan-mitra/update/<?= $kegiatan_mitra['id'] ?>" method="post">
        <?= csrf_field() ?>

        <p><label>Mitra</label><br>
            <select name="mitra_id">
                <?php foreach ($mitra as $m): ?>
                    <option value="<?= $m['id'] ?>" <?= $m['id'] == $kegiatan_mitra['mitra_id'] ? 'selected' : '' ?>>
                        <?= $m['nama_lengkap'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p><label>Survei</label><br>
            <select name="survei_id">
                <?php foreach ($survei as $s): ?>
                    <option value="<?= $s['id'] ?>" <?= $s['id'] == $kegiatan_mitra['survei_id'] ? 'selected' : '' ?>>
                        <?= $s['kode_survei'] ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>
            <label>Kegiatan Mitra</label><br>
            <input type="text" name="kegiatan" value="<?= esc($kegiatan_mitra['kegiatan']) ?>" required>
        </p>
        <p>
            <label>Bulan Kegiatan</label><br>
            <input type="month" name="bulan_kegiatan" value="<?= esc($kegiatan_mitra['bulan_kegiatan']) ?>" required>
        </p>
        <p>
            <label>Bulan Pembayaran Honor</label><br>
            <input type="month" name="bulan_pembayaran_honor"
                value="<?= esc($kegiatan_mitra['bulan_pembayaran_honor']) ?>" required>
        </p>
        <p>
            <label>Bulan Pembayaran Pulsa</label><br>
            <input type="month" name="bulan_pembayaran_pulsa"
                value="<?= esc($kegiatan_mitra['bulan_pembayaran_pulsa']) ?>" required>
        </p>
        <p>
            <label>Honor</label><br>
            <input type="number" name="honor" value="<?= esc($kegiatan_mitra['honor']) ?>" required>
        </p>
        <p>
            <label>Pulsa</label><br>
            <input type="number" name="pulsa" value="<?= esc($kegiatan_mitra['pulsa']) ?>" required>
        </p>
        <button type="submit">Update</button>
        <a href="/kegiatan-mitra">Kembali</a>
    </form>

</body>

</html>