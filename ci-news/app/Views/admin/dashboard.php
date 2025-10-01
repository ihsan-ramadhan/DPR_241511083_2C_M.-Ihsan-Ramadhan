<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Admin Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#"><b>Admin Panel</b></a>
            <div class="ms-auto">
                <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
                <h1 class="h3">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
                <p>Ini adalah halaman Dashboard Admin. Anda dapat mengelola data anggota, komponen gaji, dan penggajian.</p>
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Data Anggota</h3>
                <a href="#" class="btn btn-primary">Tambah Data Anggota</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($anggota)) : ?>
                                <?php foreach ($anggota as $item) : ?>
                                <tr>
                                    <td><?= esc($item['id_anggota']) ?></td>
                                    <td>
                                        <?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?>
                                    </td>
                                    <td><?= esc($item['jabatan']) ?></td>
                                    <td>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data anggota.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>