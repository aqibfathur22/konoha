<?php
// app/views/statistik/table_partial.php
// File ini hanya berisi bagian yang akan di-refresh (tabel & paginasi)
?>
<div class="flex-1 overflow-y-auto p-1">
    <table class="min-w-lg md:min-w-2xl rounded-lg ring-1 ring-slate-300 overflow-hidden w-full">
        <thead class="bg-sky-100 text-slate-700">
            <tr>
                <th class="px-14 py-4 text-left text-slate-700">Nama Pelapor</th>
                <th class="px-6 py-4 text-left text-slate-700">Aduan</th>
                <th class="px-6 py-4 text-left text-slate-700">Tanggal</th>
                <th class="px-6 py-4 text-left text-slate-700">Status</th>
            </tr>
        </thead>
        <tbody class="text-slate-700">
            <?php if (!empty($data['dataPengaduan'])): ?>
            <?php foreach ($data['dataPengaduan'] as $aduan): ?>
            <tr class="border-t border-slate-300 hover:bg-sky-50 transition">
                <td class="md:px-14 py-4 text-left text-xs md:text-sm xl:text-base text-slate-700"><?= htmlspecialchars($aduan['nama_pelapor']) ?></td>
                <td class="md:px-6 py-4 text-left text-xs md:text-sm xl:text-base text-slate-700 w-92"><?= htmlspecialchars($aduan['judul_pengaduan']) ?></td>
                <td class="md:px-6 py-4 text-left text-xs md:text-sm xl:text-base text-slate-700"><?= htmlspecialchars($aduan['tanggal_dikirim']) ?></td>
                <td class="md:px-3 py-4 text-left text-xs md:text-sm xl:text-base text-slate-700">
                    <?php 
                        if ($aduan['status'] === 'menunggu') {
                            $statusClass = 'bg-amber-100 text-amber-800 px-[10px]';
                        } elseif ($aduan['status'] === 'diproses') {
                            $statusClass = 'bg-sky-100 text-sky-800 px-[16px]';
                        } elseif ($aduan['status'] === 'selesai') {
                            $statusClass = 'bg-green-100 text-green-800 px-[21px]';
                        } elseif ($aduan['status'] === 'ditolak') {
                            $statusClass = 'bg-red-100 text-red-800 px-[23px]';
                        }
                    ?>
                    <span class="<?= $statusClass ?> text-sm font-medium py-1 rounded-full">
                    <?= htmlspecialchars($aduan['status']) ?>
                    </span>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="4" class="py-4 px-6 text-center text-slate-500">Data pengaduan tidak ditemukan.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>