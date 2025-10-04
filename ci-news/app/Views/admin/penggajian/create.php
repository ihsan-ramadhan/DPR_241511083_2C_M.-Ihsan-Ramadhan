<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Tambah Penggajian<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-6">
        <div class="bg-white rounded-xl shadow-lg p-6 sm:p-8">
            <h3 class="text-xl font-semibold text-slate-700 mb-6">Formulir Tambah Data Penggajian Anggota DPR</h3>

            <form action="<?= base_url('/admin/penggajian/store') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label for="id_anggota" class="block text-sm font-medium text-slate-600 mb-1">Pilih Anggota</label>
                    <select id="id_anggota" name="id_anggota" required class="w-full md:w-1/2 px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">-- Pilih Anggota --</option>
                        <?php foreach($anggota as $item): ?>
                            <option value="<?= $item['id_anggota'] ?>">
                                <?= esc(trim($item['gelar_depan'] . ' ' . $item['nama_depan'] . ' ' . $item['nama_belakang'] . ', ' . $item['gelar_belakang'], ' ,')) ?> (<?= esc($item['jabatan']) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-600 mb-2">Pilih Komponen Gaji yang Diterima</label>
                    <div id="komponen-list-container" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 border p-4 rounded-md min-h-[100px] bg-slate-50">
                        <p id="komponen-placeholder" class="text-slate-500 col-span-full text-center self-center">Pilih anggota terlebih dahulu untuk melihat komponen gaji yang tersedia.</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-4">
                    <a href="<?= base_url('/admin/penggajian') ?>" class="px-6 py-2 text-sm font-medium text-slate-700 bg-slate-100 rounded-md hover:bg-slate-200">
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

<?= $this->section('scripts') ?>
<script>
    document.getElementById('id_anggota').addEventListener('change', function() {
        const anggotaId = this.value;
        const container = document.getElementById('komponen-list-container');
        
        if (!anggotaId) {
            container.innerHTML = '<p class="text-slate-500 col-span-full text-center self-center">Pilih anggota terlebih dahulu untuk melihat komponen gaji yang tersedia.</p>';
            return;
        }

        container.innerHTML = '<p class="text-slate-500 col-span-full text-center self-center">Memuat komponen...</p>';

        fetch(`<?= base_url('/admin/penggajian/get-komponen/') ?>${anggotaId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                container.innerHTML = '';
                
                if (data.komponen && data.komponen.length > 0) {
                    data.komponen.forEach(item => {
                        const isChecked = data.existing.includes(item.id_komponen_gaji) ? 'checked' : '';
                        
                        const checkboxHTML = `
                            <div class="flex items-center">
                                <input id="komponen_${item.id_komponen_gaji}" name="id_komponen_gaji[]" type="checkbox" value="${item.id_komponen_gaji}" ${isChecked}
                                       class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500">
                                <label for="komponen_${item.id_komponen_gaji}" class="ml-2 block text-sm text-slate-800">
                                    ${item.nama_komponen}
                                </label>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', checkboxHTML);
                    });
                } else {
                    container.innerHTML = '<p class="text-slate-500 col-span-full text-center self-center">Tidak ada komponen gaji yang sesuai untuk jabatan ini.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching komponen gaji:', error);
                container.innerHTML = '<p class="text-red-500 col-span-full text-center self-center">Gagal memuat komponen gaji.</p>';
            });
    });
</script>
<?= $this->endSection() ?>