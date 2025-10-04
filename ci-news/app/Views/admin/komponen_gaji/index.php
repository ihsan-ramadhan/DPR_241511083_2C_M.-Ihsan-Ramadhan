<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Data Komponen Gaji<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-6">
        <?php if (session()->getFlashdata('success')) : ?>
        <div id="global-notification" class="fixed top-5 right-5 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center z-50" role="alert">
            <span class="block sm:inline mr-4"><?= session()->getFlashdata('success') ?></span>
            <button id="close-notification" class="text-green-700 hover:text-green-900">
                <span class="text-2xl">&times;</span>
            </button>
        </div>

        <?php elseif (session()->getFlashdata('info')) : ?>
        <div id="global-notification" class="fixed top-5 right-5 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded-lg shadow-lg flex items-center z-50" role="alert">
            <span class="block sm:inline mr-4"><?= session()->getFlashdata('info') ?></span>
            <button id="close-notification" class="text-blue-700 hover:text-blue-900">
                <span class="text-2xl">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="p-6 sm:px-8 flex justify-between items-center border-b">
                <h3 class="text-xl font-semibold text-slate-700">Data Komponen Gaji & Tunjangan</h3>
                <a href="<?= base_url('/admin/komponen-gaji/create') ?>" class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Tambah Komponen</a>
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
                                    <a href="<?= base_url('/admin/komponen-gaji/edit/' . $item['id_komponen_gaji']) ?>" class="font-medium text-yellow-500 hover:underline">Edit</a>
                                    <a href="<?= base_url('/admin/komponen-gaji/delete/' . $item['id_komponen_gaji']) ?>" 
                                        class="font-medium text-red-500 hover:underline delete-link"
                                        data-type="komponen gaji"
                                        data-name="<?= esc($item['nama_komponen']) ?>">
                                        Hapus
                                    </a>
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