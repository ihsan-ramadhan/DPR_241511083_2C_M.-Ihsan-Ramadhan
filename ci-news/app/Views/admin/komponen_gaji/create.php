<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Tambah Komponen Gaji<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <h3 class="text-xl font-semibold text-slate-700 mb-6">Formulir Tambah Komponen Gaji</h3>

            <form action="<?= base_url('/admin/komponen-gaji/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="id_komponen_gaji" class="block text-sm font-medium text-slate-600">ID Komponen</label>
                        <input type="text" id="id_komponen_gaji" name="id_komponen_gaji" required
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="nama_komponen" class="block text-sm font-medium text-slate-600">Nama Komponen</label>
                        <input type="text" id="nama_komponen" name="nama_komponen" required
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="kategori" class="block text-sm font-medium text-slate-600">Kategori</label>
                        <select id="kategori" name="kategori" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Gaji Pokok</option>
                            <option>Tunjangan Melekat</option>
                            <option>Tunjangan Lain</option>
                        </select>
                    </div>
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-slate-600">Untuk Jabatan</label>
                        <select id="jabatan" name="jabatan" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Semua</option>
                            <option>Ketua</option>
                            <option>Wakil Ketua</option>
                            <option>Anggota</option>
                        </select>
                    </div>
                    <div>
                        <label for="nominal" class="block text-sm font-medium text-slate-600">Nominal</label>
                        <input type="number" id="nominal" name="nominal" required placeholder="Contoh: 5000000"
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="satuan" class="block text-sm font-medium text-slate-600">Satuan</label>
                        <select id="satuan" name="satuan" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Bulan</option>
                            <option>Hari</option>
                            <option>Periode</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?= base_url('/admin/komponen-gaji') ?>" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Simpan Komponen
                    </button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>