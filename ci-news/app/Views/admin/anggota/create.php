<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Tambah Data Anggota<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <h3 class="text-xl font-semibold text-slate-700 mb-6">Formulir Tambah Anggota DPR</h3>

            <form action="<?= base_url('/admin/anggota/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="id_anggota" class="block text-sm font-medium text-slate-600">ID Anggota</label>
                        <input type="text" id="id_anggota" name="id_anggota" required
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="jabatan" class="block text-sm font-medium text-slate-600">Jabatan</label>
                        <select id="jabatan" name="jabatan" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Ketua</option>
                            <option>Wakil Ketua</option>
                            <option>Anggota</option>
                        </select>
                    </div>
                    <div>
                        <label for="nama_depan" class="block text-sm font-medium text-slate-600">Nama Depan</label>
                        <input type="text" id="nama_depan" name="nama_depan" required
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="nama_belakang" class="block text-sm font-medium text-slate-600">Nama Belakang</label>
                        <input type="text" id="nama_belakang" name="nama_belakang" required
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="gelar_depan" class="block text-sm font-medium text-slate-600">Gelar Depan (Opsional)</label>
                        <input type="text" id="gelar_depan" name="gelar_depan"
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="gelar_belakang" class="block text-sm font-medium text-slate-600">Gelar Belakang (Opsional)</label>
                        <input type="text" id="gelar_belakang" name="gelar_belakang"
                               class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                     <div>
                        <label for="status_pernikahan" class="block text-sm font-medium text-slate-600">Status Pernikahan</label>
                        <select id="status_pernikahan" name="status_pernikahan" class="mt-1 w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="Kawin">Kawin</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?= base_url('/admin/anggota') ?>" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>