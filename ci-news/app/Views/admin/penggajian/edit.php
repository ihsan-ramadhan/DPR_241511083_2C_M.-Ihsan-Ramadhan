<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Ubah Penggajian<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <h3 class="text-xl font-semibold text-slate-700 mb-6">Formulir Ubah Data Penggajian Anggota DPR</h3>

            <form action="<?= base_url('/admin/penggajian/store') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label for="id_anggota" class="block text-sm font-medium text-slate-600 mb-1">Anggota</label>
                    <input type="hidden" name="id_anggota" value="<?= $anggota['id_anggota'] ?>">
                    <select id="id_anggota" disabled class="w-full md:w-1/2 px-3 py-2 border border-slate-300 rounded-md shadow-sm bg-slate-100 cursor-not-allowed">
                        <option>
                            <?= esc(trim($anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ', ' . $anggota['gelar_belakang'], ' ,')) ?> (<?= esc($anggota['jabatan']) ?>)
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">Pilih Komponen Gaji yang Diterima</label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 border p-4 rounded-md">
                        <?php foreach($komponen_gaji as $item): ?>
                            <?php $isChecked = in_array($item['id_komponen_gaji'], $existing_ids) ? 'checked' : ''; ?>
                            <div class="flex items-center">
                                <input id="komponen_<?= $item['id_komponen_gaji'] ?>" name="id_komponen_gaji[]" type="checkbox" value="<?= $item['id_komponen_gaji'] ?>" <?= $isChecked ?>
                                       class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <label for="komponen_<?= $item['id_komponen_gaji'] ?>" class="ml-2 block text-sm text-slate-800">
                                    <?= esc($item['nama_komponen']) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?= base_url('/admin/penggajian') ?>" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
                        Batal
                    </a>
                    <button type="submit" class="px-6 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>