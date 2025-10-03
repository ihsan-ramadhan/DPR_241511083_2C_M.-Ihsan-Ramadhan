<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Public Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar_public') ?>

<div class="container mx-auto px-6 py-4">
        <h1 class="text-xl font-semibold text-slate-700">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
        <p class="text-slate-600 mt-1">Berikut adalah daftar anggota DPR yang terdaftar dalam sistem.</p>
</div>
<?= $this->endSection() ?>