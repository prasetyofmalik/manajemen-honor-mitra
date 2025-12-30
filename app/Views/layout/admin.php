<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title ?? 'Admin Panel' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>