<main class="p-4 overflow-y-auto flex-1">
    <div class="bg-slate-100 rounded-lg p-4 mt-5">
        <form action="" method="post">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-8 mb-16">
                <!-- Total -->
                <button
                    name="total"
                    cursor="pointer"
                    class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                    <h3 class="text-xl font-semibold text-slate-700">Total Pengaduan</h3>
                    <p class="text-4xl font-bold text-indigo-600 mt-2">
                        <?= $data['dataStatistik']['total'] ?? 0 ?>
                    </p>
                </button>
                <!-- Pending -->
                <button
                    name="menunggu"
                    class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                    <h3 class="text-xl font-semibold text-slate-700">Menunggu</h3>
                    <p class="text-4xl font-bold text-yellow-500 mt-2">
                        <?= $data['dataStatistik']['menunggu'] ?? 0 ?>
                    </p>
                </button>
                <!-- Diproses -->
                <button
                    name="diproses"
                    cursor="pointer"
                    class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                    <h3 class="text-xl font-semibold text-slate-700">Diproses</h3>
                    <p class="text-4xl font-bold text-blue-500 mt-2">
                        <?= $data['dataStatistik']['diproses'] ?? 0 ?>
                    </p>
                </button>
                <!-- Selesai -->
                <button
                    name="selesai"
                    cursor="pointer"
                    class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                    <h3 class="text-xl font-semibold text-slate-700">Selesai</h3>
                    <p class="text-4xl font-bold text-green-500 mt-2">
                        <?= $data['dataStatistik']['selesai'] ?? 0 ?>
                    </p>
                </button>
                <!-- Ditolak : belum bs-->
                <button
                    name="ditolak"
                    cursor="pointer"
                    class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                    <h3 class="text-xl font-semibold text-slate-700">Ditolak</h3>
                    <p class="text-4xl font-bold text-red-700 mt-2">
                        <?= $data['dataStatistik']['ditolak'] ?? 0 ?>
                    </p>
                </button>
            </div>
        </form>

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
                            href="<?=BASEURL?>/Beranda_controller/detail/<?= $aduan['id_pengaduan'] ?>"
                            class="px-4 py-1 bg-yellow-500 hover:bg-yellow-600 rounded-xl flex-1 h-7 w-15 text-center text-white">
                            Detail
                        </a>
                    </td>
                    <td class="pr-16 py-4 w-24 justify-center text-center">
                        <a
                            href="<?=BASEURL?>/Beranda_controller/deleteAduan/<?= $aduan['id_pengaduan'] ?>"
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
    </div>
</main>
