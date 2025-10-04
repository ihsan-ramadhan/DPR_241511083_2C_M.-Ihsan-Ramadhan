<?= $this->extend('layouts/template') ?>

<?= $this->section('title') ?>
    Data Penggajian
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar_public') ?>

<div class="container mx-auto px-6 py-6">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="p-6 sm:px-8 border-b border-slate-200">
            <h3 class="text-xl font-semibold text-slate-700">Data Penggajian Anggota DPR</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-500">
                <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-4">ID</th>
                        <th scope="col" class="px-6 py-4">Nama Lengkap</th>
                        <th scope="col" class="px-6 py-4">Jabatan</th>
                        <th scope="col" class="px-6 py-4">Take Home Pay (Per Bulan)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($penggajian as $item) : ?>
                    <tr class="bg-white border-b hover:bg-slate-50">
                        <td class="px-6 py-4 font-medium text-slate-900"><?= esc($item['id_anggota']) ?></td>
                        <td class="px-6 py-4"><?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?></td>
                        <td class="px-6 py-4"><?= esc($item['jabatan']) ?></td>
                        <td class="px-6 py-4">Rp. <?= number_format($item['take_home_pay'], 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>