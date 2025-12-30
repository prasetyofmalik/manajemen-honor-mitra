<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">
            Dashboard Honor Mitra
        </h4>
    </div>

    <!-- Filter -->
    <div class="card shadow-sm mb-3">
        <div class="card-body">
            <form method="get" class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="form-label">Bulan Kegiatan</label>
                    <input type="month"
                        name="bulan_kegiatan"
                        class="form-control"
                        value="<?= esc($filter['bulan_kegiatan']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Bulan Pembayaran Honor</label>
                    <input type="month"
                        name="bulan_pembayaran_honor"
                        class="form-control"
                        value="<?= esc($filter['bulan_pembayaran_honor']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Bulan Pembayaran Pulsa</label>
                    <input type="month"
                        name="bulan_pembayaran_pulsa"
                        class="form-control"
                        value="<?= esc($filter['bulan_pembayaran_pulsa']) ?>">
                </div>

                <div class="col-md-3 text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-funnel"></i> Terapkan Filter
                    </button>
                    <a href="/dashboard" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>

            </form>
        </div>
    </div>

    <!-- Pivot Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive" style="max-height: 70vh;">
                <table class="table table-bordered table-hover mb-0">

                    <thead class="table-light text-center align-middle sticky-top">
                        <tr>
                            <th style="min-width: 220px;">Nama Mitra</th>

                            <?php foreach ($survei as $s): ?>
                                <?php
                                // Hide column if TOTAL = 0 and filters are active
                                $hasFilters = !empty($filter['bulan_kegiatan']) ||
                                    !empty($filter['bulan_pembayaran_honor']) ||
                                    !empty($filter['bulan_pembayaran_pulsa']);
                                $colTotalValue = $colTotal[$s['id']] ?? 0;
                                if ($hasFilters && $colTotalValue == 0) {
                                    continue;
                                }
                                ?>
                                <th style="min-width: 120px;">
                                    <?= esc($s['kode_survei']) ?>
                                </th>
                            <?php endforeach; ?>

                            <th style="min-width: 150px;" class="bg-light">
                                Total Mitra
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($mitra)): ?>
                            <tr>
                                <td colspan="<?= count($survei) + 2 ?>"
                                    class="text-center text-muted py-4">
                                    Tidak ada data
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($mitra as $m): ?>
                            <?php
                            // Hide row if Total Mitra = 0 and filters are active
                            $hasFilters = !empty($filter['bulan_kegiatan']) ||
                                !empty($filter['bulan_pembayaran_honor']) ||
                                !empty($filter['bulan_pembayaran_pulsa']);
                            $rowTotalValue = $rowTotal[$m['id']] ?? 0;
                            if ($hasFilters && $rowTotalValue == 0) {
                                continue;
                            }
                            ?>
                            <tr>
                                <td>
                                    <?= esc($m['nama_lengkap']) ?>
                                </td>

                                <?php foreach ($survei as $s): ?>
                                    <?php
                                    // Skip column if TOTAL = 0 and filters are active
                                    $colTotalValue = $colTotal[$s['id']] ?? 0;
                                    if ($hasFilters && $colTotalValue == 0) {
                                        continue;
                                    }
                                    ?>
                                    <td class="text-end">
                                        <?php
                                        $nilai = $matrix[$m['id']][$s['id']] ?? 0;
                                        ?>
                                        <?= $nilai > 0
                                            ? number_format($nilai, 0, ',', '.')
                                            : '<span class="text-muted">-</span>'
                                        ?>
                                    </td>
                                <?php endforeach; ?>

                                <td class="text-end fw-semibold bg-light">
                                    <?= number_format($rowTotalValue, 0, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <!-- Footer Total -->
                    <tfoot class="table-secondary fw-semibold">
                        <tr>
                            <td class="text-center">
                                TOTAL
                            </td>

                            <?php foreach ($survei as $s): ?>
                                <?php
                                // Hide column if TOTAL = 0 and filters are active
                                $hasFilters = !empty($filter['bulan_kegiatan']) ||
                                    !empty($filter['bulan_pembayaran_honor']) ||
                                    !empty($filter['bulan_pembayaran_pulsa']);
                                $colTotalValue = $colTotal[$s['id']] ?? 0;
                                if ($hasFilters && $colTotalValue == 0) {
                                    continue;
                                }
                                ?>
                                <td class="text-end">
                                    <?= number_format($colTotalValue, 0, ',', '.') ?>
                                </td>
                            <?php endforeach; ?>

                            <td class="text-end">
                                <?= number_format($grandTotal, 0, ',', '.') ?>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>