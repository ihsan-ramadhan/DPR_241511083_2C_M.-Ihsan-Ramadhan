<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<nav class="bg-blue-500 shadow-md">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a class="text-xl font-bold text-white" href="#">Aplikasi Gaji DPR</a>
        <a href="<?= base_url('/logout') ?>" class="logout-link px-4 py-2 text-sm font-medium text-blue-600 bg-white rounded-md hover:bg-slate-100">Logout</a>
    </div>
</nav>

<div class="container mx-auto px-6 py-4">
        <h1 class="text-xl font-semibold text-slate-700">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
        <p class="text-slate-600 mt-1">Berikut adalah daftar anggota DPR yang terdaftar dalam sistem.</p>
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mt-2">
         <div class="p-6 sm:px-8 border-b border-slate-200">
            <h3 class="text-xl font-semibold text-slate-700">Data Anggota DPR</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-3">Jabatan</th>
                        <th scope="col" class="px-6 py-3">Status Pernikahan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($anggota)) : ?>
                        <?php foreach ($anggota as $item) : ?>
                        <tr class="bg-white border-b hover:bg-slate-50">
                            <td class="px-6 py-4 font-medium text-slate-900"><?= esc($item['id_anggota']) ?></td>
                            <td class="px-6 py-4"><?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?></td>
                            <td class="px-6 py-4"><?= esc($item['jabatan']) ?></td>
                            <td class="px-6 py-4"><?= esc($item['status_pernikahan']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                         <tr class="bg-white border-b">
                            <td colspan="4" class="px-6 py-4 text-center">Tidak ada data anggota.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const logoutModal = document.getElementById('logout-modal');
    const cancelLogoutButton = document.getElementById('cancel-logout');
    const confirmLogoutButton = document.getElementById('confirm-logout');
    const logoutLinks = document.querySelectorAll('.logout-link');

    logoutLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const logoutUrl = this.href;
            confirmLogoutButton.href = logoutUrl;
            logoutModal.classList.remove('hidden');
        });
    });

    cancelLogoutButton.addEventListener('click', function() {
        logoutModal.classList.add('hidden');
    });

    logoutModal.addEventListener('click', function(event) {
        if (event.target === this) {
            logoutModal.classList.add('hidden');
        }
    });
</script>
<?= $this->endSection() ?>