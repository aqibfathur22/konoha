<table class="w-full text-slate-800 border border-sky-800 rounded-lg overflow-hidden shadow-md mb-4">
    <thead class="bg-sky-800 text-white">
        <tr>
            <th class="pl-16 py-2 w-70 text-left">Nama Pelapor</th>
            <th class="px-4 py-2 w-96 text-left">Aduan</th>
            <th class="px-4 py-2 w-62 text-center">Tanggal</th>
            <th class="px-10 py-2 w-24 text-center">Status</th>
            <th class="px-4 py-2 w-24 text-center">Detail</th>
            <th class="pr-16 py-2 w-24 text-center">Hapus</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-slate-200">
        <?php if (!empty($data['dataPengaduan'])) : ?>
        <?php foreach ($data['dataPengaduan'] as $aduan): ?>
        <tr>
            <td class="pl-16 py-4 w-70"><?= htmlspecialchars($aduan['nama_pelapor']) ?></td>
            <td class="px-4 py-4 w-96"><?= htmlspecialchars($aduan['judul_pengaduan']) ?></td>
            <td class="px-4 py-4 w-62 text-center"><?= htmlspecialchars($aduan['tanggal_dikirim']) ?></td>
            <td class="px-10 py-4 w-24 text-center">
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
            <td class="px-4 py-4 w-24 justify-center text-center">
                <a
                    href="<?=BASEURL?>/Beranda/detail/<?= $aduan['id_pengaduan'] ?>"
                    class="px-4 py-1 bg-yellow-500 hover:bg-yellow-600 rounded-xl flex-1 h-7 w-15 text-center text-white">
                    Detail
                </a>
            </td>
            <td class="pr-16 py-4 w-24 justify-center text-center">
                <a
                    href="<?=BASEURL?>/Beranda/deleteAduan/<?= $aduan['id_pengaduan'] ?>"
                    class="delete-btn-beranda px-4 py-1 bg-red-700 hover:bg-red-800 rounded-xl flex-1 h-7 w-15 text-center text-white">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

        <?php else: ?>
        <tr>
            <td colspan="4" class="py-4 px-6 text-center text-slate-500">Belum ada pengaduan yang selesai.</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
