<?= $this->extend('layouts/template') ?>
<?= $this->section('title') ?>Detail Penggajian<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= $this->include('layouts/navbar_admin') ?>

    <div class="container mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden flex flex-col">
            <div class="p-6 sm:px-8 border-b">
                <h3 class="text-xl font-semibold text-slate-700">Detail Gaji Anggota</h3>
                <p class="text-slate-500 mt-1">Rincian komponen gaji bulanan untuk:</p>
                <h4 class="text-2xl font-bold text-slate-800 mt-2">
                    <?= esc(trim($detail['anggota']['gelar_depan'] . ' ' . $detail['anggota']['nama_depan'] . ' ' . $detail['anggota']['nama_belakang'] . ', ' . $detail['anggota']['gelar_belakang'], ' ,')) ?>
                </h4>
                <p class="text-slate-600"><?= esc($detail['anggota']['jabatan']) ?></p>
            </div>

            <div class="overflow-y-auto h-96 px-8 bg-slate-50">
                <table class="w-full text-sm">
                    <thead class="text-xs text-slate-700 uppercase bg-white sticky top-0">
                        <tr class="bg-slate-50">
                            <th class="py-4 text-left">Nama Komponen Gaji</th>
                            <th class="py-4 text-right">Nominal</th>
                        </tr>
                    </thead>
                    <tbody class="text-slate-600">
                        <?php $total = 0; ?>
                        <?php foreach($detail['komponen'] as $item): ?>
                        <tr class="border-t">
                            <td class="py-3"><?= esc($item['nama_komponen']) ?></td>
                            <td class="py-3 text-right">Rp. <?= number_format($item['nominal'], 0, ',', '.') ?></td>
                        </tr>
                        <?php $total += $item['nominal']; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="p-4 sm:px-8 border-t">
                 <table class="w-full font-medium">
                     <tfoot class="font-medium">
                        <tr class="border-slate-300">
                            <td class="py-3 text-left text-base">Total Take Home Pay</td>
                            <td class="py-3 text-right text-base">Rp. <?= number_format($total, 0, ',', '.') ?></td>
                        </tr>
                    </tfoot>
                 </table>
            </div>
             <div class="p-6 text-right bg-white">
                <a href="<?= base_url('/admin/penggajian') ?>" class="px-6 py-2 text-white font-medium text-slate-700 bg-blue-500 rounded-md hover:bg-blue-600">
                    Kembali
                </a>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>