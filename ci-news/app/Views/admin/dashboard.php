<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Admin Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar_admin') ?>

<div class="container mx-auto px-6 py-4">
        <h1 class="text-xl font-semibold text-slate-700">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
        <p class="text-slate-600 mt-1">Anda dapat mengelola data anggota DPR, komponen gaji, dan penggajian.</p>
</div>
<?= $this->endSection() ?>