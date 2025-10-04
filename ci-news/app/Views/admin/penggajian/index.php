<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Data Penggajian
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar_admin') ?>

<div class="container mx-auto px-6 py-6">
    <?php if (session()->getFlashdata('success')) : ?>
        <div id="global-notification" class="fixed top-5 right-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center z-50" role="alert">
        <span class="block sm:inline mr-4"><?= session()->getFlashdata('success') ?></span>
        <button id="close-notification" class="text-green-700 hover:text-green-900"><span class="text-2xl">&times;</span></button>
        </div>
    <?php endif; ?>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 sm:px-8 flex justify-between items-center border-b border-slate-200">
            <h3 class="text-xl font-semibold text-slate-700">Data Penggajian Anggota DPR</h3>
            <a href="<?= base_url('/admin/penggajian/create') ?>" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah Data</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-4">Jabatan</th>
                        <th scope="col" class="px-6 py-4">Take Home Pay</th>
                        <th scope="col" class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penggajian as $item) : ?>
                    <tr class="bg-white border-b hover:bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900"><?= esc($item['id_anggota']) ?></td>
                        <td class="px-6 py-4"><?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?></td>
                        <td class="px-6 py-4"><?= esc($item['jabatan']) ?></td>
                        <td class="px-6 py-4">Rp. <?= number_format($item['take_home_pay'], 0, ',', '.') ?></td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="<?= base_url('/admin/penggajian/' . $item['id_anggota']) ?>" class="font-medium text-blue-500 hover:underline">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>