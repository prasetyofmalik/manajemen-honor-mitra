<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Admin Panel' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app-styles.css">
</head>

<body>

    <div class="d-flex">
        <?= $this->include('partials/sidebar') ?>

        <div class="flex-grow-1">
            <?= $this->include('partials/navbar') ?>

            <main class="container-fluid mt-4">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="container-fluid">
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="container-fluid">
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <!-- jQuery & Select2 (for kegiatan_mitra pages) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Centralized Application Scripts -->
    <script src="/assets/js/app-scripts.js"></script>
</body>

</html>