<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Dashboard Honor Mitra</h4>
            <p class="text-muted small mb-0">Monitor akumulasi honorarium mitra lintas kegiatan</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">
            <form method="get" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Kegiatan</label>
                    <input type="month" name="bulan_kegiatan" class="form-control bg-light border-0" value="<?= esc($filter['bulan_kegiatan']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Honor</label>
                    <input type="month" name="bulan_pembayaran_honor" class="form-control bg-light border-0" value="<?= esc($filter['bulan_pembayaran_honor']) ?>">
                </div>

                <div class="col-md-3">
                    <label class="form-label small fw-bold text-uppercase text-secondary">Bulan Bayar Pulsa</label>
                    <input type="month" name="bulan_pembayaran_pulsa" class="form-control bg-light border-0" value="<?= esc($filter['bulan_pembayaran_pulsa']) ?>">
                </div>

                <div class="col-md-3 d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4 w-100 fw-medium">
                        <i class="bi bi-funnel me-1"></i> Filter
                    </button>
                    <a href="/dashboard" class="btn btn-light border w-100 fw-medium text-muted">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <?php
            $isFiltered = !empty($filter['bulan_kegiatan']) || !empty($filter['bulan_pembayaran_honor']) || !empty($filter['bulan_pembayaran_pulsa']);
            $hasHonorF = !empty($filter['bulan_pembayaran_honor']);
            $hasPulsaF = !empty($filter['bulan_pembayaran_pulsa']);

            $showHonorCol = true;
            $showPulsaCol = true;
            if ($hasHonorF && !$hasPulsaF) $showPulsaCol = false;
            elseif (!$hasHonorF && $hasPulsaF) $showHonorCol = false;
            ?>

            <div class="table-responsive" style="max-height: 70vh;">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                    <thead class="bg-light text-secondary text-uppercase small fw-bolder sticky-top">
                        <tr>
                            <th class="ps-4 py-3 bg-light" style="min-width: 250px; z-index: 1021;">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span>Nama Mitra</span>
                                    <div class="dropdown">
                                        <button class="btn btn-link btn-sm text-secondary p-0 border-0" type="button" id="nameFilterDropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                                            <i class="bi bi-search"></i>
                                        </button>
                                        <div class="dropdown-menu p-3 shadow-lg border-0" style="width: 280px; margin-top: 10px;">
                                            <input type="text" id="mitraSearchInput" class="form-control form-control-sm border-0 bg-light" placeholder="Cari nama mitra...">
                                            <div class="d-flex justify-content-between align-items-center mt-2 px-1">
                                                <span class="text-muted" style="font-size: 0.7rem;">Hasil: <span id="visibleRowCount"><?= count($mitra) ?></span></span>
                                                <button type="button" id="clearSearch" class="btn btn-link btn-sm p-0 text-decoration-none" style="font-size: 0.7rem;">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </th>
                            <?php foreach ($survei as $s):
                                $colTotalValue = $colTotal[$s['id']] ?? 0;
                                if ($isFiltered && $colTotalValue == 0) continue;
                            ?>
                                <th class="text-center py-3">
                                    <div class="text-primary"><?= esc($s['kode_survei']) ?></div>
                                    <div class="d-flex justify-content-center gap-1 mt-1" style="font-size: 0.6rem;">
                                        <?php if ($showHonorCol): ?><span class="badge bg-light text-success border border-success">Honor</span><?php endif; ?>
                                        <?php if ($showPulsaCol): ?><span class="badge bg-light text-info border border-info">Pulsa</span><?php endif; ?>
                                    </div>
                                </th>
                            <?php endforeach; ?>
                            <th class="text-end pe-4 py-3 shadow-sm bg-light" style="min-width: 150px;">Grand Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mitra as $m):
                            $rowTotalValue = $rowTotal[$m['id']] ?? 0;
                            if ($isFiltered && $rowTotalValue == 0) continue;

                            $isOverHonor = false;
                            $isOverPulsa = false;
                            if ($isFiltered) {
                                $currentMitraHonorSum = 0;
                                $currentMitraPulsaSum = 0;
                                if (isset($matrix[$m['id']])) {
                                    foreach ($matrix[$m['id']] as $surveyActivities) {
                                        foreach ($surveyActivities as $act) {
                                            $currentMitraHonorSum += $act['honor'];
                                            $currentMitraPulsaSum += $act['pulsa'];
                                        }
                                    }
                                }
                                if ($showHonorCol && $currentMitraHonorSum > 3400000) $isOverHonor = true;
                                if ($showPulsaCol && $currentMitraPulsaSum > 50000) $isOverPulsa = true;
                            }
                            $rowClass = ($isOverHonor || $isOverPulsa) ? 'table-danger-light' : '';
                        ?>
                            <tr class="<?= $rowClass ?>">
                                <td class="ps-4 border-end">
                                    <div class="fw-bold text-dark"><?= esc($m['nama_lengkap']) ?></div>
                                    <?php if ($isOverHonor): ?>
                                        <div class="text-danger fw-bold" style="font-size: 0.65rem;"><i class="bi bi-exclamation-triangle me-1"></i>Honor Melebihi SBML</div>
                                    <?php endif; ?>
                                    <?php if ($isOverPulsa): ?>
                                        <div class="text-danger fw-bold" style="font-size: 0.65rem;"><i class="bi bi-phone-vibrate me-1"></i>Pulsa Melebihi SBML</div>
                                    <?php endif; ?>
                                </td>

                                <?php foreach ($survei as $s):
                                    $colTotalValue = $colTotal[$s['id']] ?? 0;
                                    if ($isFiltered && $colTotalValue == 0) continue;
                                    $activities = $matrix[$m['id']][$s['id']] ?? [];
                                ?>
                                    <td class="px-2">
                                        <?php if (!empty($activities)): ?>
                                            <?php foreach ($activities as $act): ?>
                                                <div class="mb-2 border-bottom border-light pb-1">
                                                    <div class="text-muted mb-1 fw-medium" style="font-size: 0.75rem;"><?= esc($act['nama']) ?></div>
                                                    <div class="d-flex justify-content-between small">
                                                        <?php if ($showHonorCol): ?>
                                                            <span class="text-success">H: <strong><?= number_format($act['honor'], 0, ',', '.') ?></strong></span>
                                                        <?php endif; ?>
                                                        <?php if ($showPulsaCol): ?>
                                                            <span class="text-info">P: <strong><?= number_format($act['pulsa'], 0, ',', '.') ?></strong></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="text-center text-muted opacity-25">-</div>
                                        <?php endif; ?>
                                    </td>
                                <?php endforeach; ?>

                                <td class="text-end pe-4 fw-bold border-start <?= ($isOverHonor || $isOverPulsa) ? 'text-danger' : 'text-primary' ?>">
                                    Rp <?= number_format($rowTotalValue, 0, ',', '.') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot class="sticky-bottom bg-white border-top border-2">
                        <?php if ($showHonorCol): ?>
                            <tr class="bg-light">
                                <td class="ps-4 text-secondary small fw-bold">TOTAL HONOR</td>
                                <?php foreach ($survei as $s):
                                    if ($isFiltered && ($colTotal[$s['id']] ?? 0) == 0) continue;
                                ?>
                                    <td class="text-end px-3 text-success fw-bold small"><?= number_format($colHonorTotal[$s['id']] ?? 0, 0, ',', '.') ?></td>
                                <?php endforeach; ?>
                                <td class="text-end pe-4 text-success fw-bold">Rp <?= number_format(array_sum($colHonorTotal), 0, ',', '.') ?></td>
                            </tr>
                        <?php endif; ?>
                        <?php if ($showPulsaCol): ?>
                            <tr class="bg-light">
                                <td class="ps-4 text-secondary small fw-bold">TOTAL PULSA</td>
                                <?php foreach ($survei as $s):
                                    if ($isFiltered && ($colTotal[$s['id']] ?? 0) == 0) continue;
                                ?>
                                    <td class="text-end px-3 text-info fw-bold small"><?= number_format($colPulsaTotal[$s['id']] ?? 0, 0, ',', '.') ?></td>
                                <?php endforeach; ?>
                                <td class="text-end pe-4 text-info fw-bold">Rp <?= number_format(array_sum($colPulsaTotal), 0, ',', '.') ?></td>
                            </tr>
                        <?php endif; ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>