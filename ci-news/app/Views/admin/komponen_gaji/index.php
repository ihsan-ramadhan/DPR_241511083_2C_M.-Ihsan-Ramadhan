<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Data Komponen Gaji<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 sm:px-8 flex justify-between items-center border-b">
                <h3 class="text-xl font-semibold text-slate-700">Data Komponen Gaji & Tunjangan</h3>
                <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah Komponen</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-slate-500">
                    <thead class="text-xs text-slate-700 uppercase bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-4">ID</th>
                            <th scope="col" class="px-6 py-4">Nama Komponen</th>
                            <th scope="col" class="px-6 py-4">Kategori</th>
                            <th scope="col" class="px-6 py-4">Untuk Jabatan</th>
                            <th scope="col" class="px-6 py-4">Nominal</th>
                            <th scope="col" class="px-6 py-4">Satuan</th>
                            <th scope="col" class="px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($komponen_gaji)) : ?>
                            <?php foreach ($komponen_gaji as $item) : ?>
                            <tr class="bg-white border-b hover:bg-slate-50">
                                <td class="px-6 py-4 font-medium text-slate-900"><?= esc($item['id_komponen_gaji']) ?></td>
                                <td class="px-6 py-4"><?= esc($item['nama_komponen']) ?></td>
                                <td class="px-6 py-4"><?= esc($item['kategori']) ?></td>
                                <td class="px-6 py-4"><?= esc($item['jabatan']) ?></td>
                                <td class="px-6 py-4">Rp. <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                                <td class="px-6 py-4"><?= esc($item['satuan']) ?></td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="#" class="font-medium text-yellow-500 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-500 hover:underline">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr class="bg-white border-b">
                                <td colspan="7" class="px-6 py-4 text-center">Tidak ada data komponen gaji.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>