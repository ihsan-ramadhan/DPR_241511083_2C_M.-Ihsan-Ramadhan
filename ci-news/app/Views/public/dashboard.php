<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Portal Transparansi</b></a>
            <div class="ms-auto">
                <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h1 class="h3">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
                <p>Aplikasi ini bertujuan untuk memberikan gambaran yang jelas mengenai penghasilan anggota DPR kepada publik.</p>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>