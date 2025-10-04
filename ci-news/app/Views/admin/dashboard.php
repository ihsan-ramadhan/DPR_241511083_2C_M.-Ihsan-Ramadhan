<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Admin Dashboard
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar_admin') ?>

<div class="container mx-auto px-6 py-6">
    <h1 class="text-xl font-bold text-slate-700">Selamat Datang, <?= session()->get('nama_depan') ?>!</h1>
    <p class="text-slate-600 mt-1">Anda dapat mengelola data anggota DPR, data penggajian, dan komponen gaji.</p>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-6">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
            <div class="p-6 flex justify-between items-center border-b">
                <h3 class="text-lg font-semibold">Data Anggota</h3>
                <a href="<?= base_url('/admin/anggota') ?>" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Edit Data</a>
            </div>
            <div class="overflow-y-auto h-72">
                <table class="w-full text-sm">
                    <thead class="text-xs text-slate-700 uppercase bg-slate-50 sticky top-0">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left">ID</th>
                            <th scope="col" class="px-6 py-4 text-left">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-4 text-left">Jabatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <?php foreach($anggota as $item): ?>
                        <tr class="border-t">
                            <td class="px-6 py-4 font-medium"><?= esc($item['id_anggota']) ?></td>
                            <td class="px-6 py-4"><?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?></td>
                            <td class="px-6 py-4"><?= esc($item['jabatan']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
            <div class="p-6 flex justify-between items-center border-b">
                <h3 class="text-lg font-semibold">Data Penggajian</h3>
                <a href="<?= base_url('/admin/penggajian') ?>" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Edit Data</a>
            </div>
            <div class="overflow-y-auto h-72">
                <table class="w-full text-sm">
                    <thead class="text-xs text-slate-700 uppercase bg-slate-50 sticky top-0">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left">ID</th>
                            <th scope="col" class="px-6 py-4 text-left">Nama Lengkap</th>
                            <th scope="col" class="px-6 py-4 text-left">Take Home Pay (Per Bulan)</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <?php foreach($penggajian as $item): ?>
                        <tr class="border-t">
                            <td class="px-6 py-4 font-medium"><?= esc($item['id_anggota']) ?></td>
                            <td class="px-6 py-4"><?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?></td>
                            <td class="px-6 py-4">Rp. <?= number_format($item['take_home_pay'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>