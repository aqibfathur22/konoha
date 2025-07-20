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

        <div class="flex justify-between">
            <div class="mb-8 flex justify-between">
                <div class="flex items-center gap-1">
                    <?php
                        $totalPages = $data['count']['totalPages'];
                        $currentPage = $data['count']['currentPage'];
                        $range = 1; // jumlah halaman sebelum dan sesudah currentPage

                        $start = max(2, $currentPage - $range);
                        $end = min($totalPages - 1, $currentPage + $range);
                    ?>  

                    <a href="?page=1"
                    class="px-3 py-1 rounded-md border border-slate-300 text-slate-700 hover:bg-sky-100 transition
                    <?= $currentPage == 1 ? 'font-bold bg-sky-100 text-sky-600 border-blue-400' : '' ?>">
                        1
                    </a>

                    <?php if ($start > 2): ?>
                        <span class="px-2 text-slate-400">...</span>
                    <?php endif; ?>

                    <?php for ($i = $start; $i <= $end; $i++): ?>
                        <a href="?page=<?= $i ?>"
                        class="px-3 py-1 rounded-md border border-slate-300 text-slate-700 hover:bg-sky-100 transition
                        <?= $i == $currentPage ? 'font-bold bg-sky-100 text-sky-600 border-blue-400' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($end < $totalPages - 1): ?>
                        <span class="px-2 text-slate-400">...</span>
                    <?php endif; ?>

                    <?php if ($totalPages > 1): ?>
                        <a href="?page=<?= $totalPages ?>"
                        class="px-3 py-1 rounded-md border border-slate-300 text-slate-700 hover:bg-sky-100 transition
                        <?= $currentPage == $totalPages ? 'font-bold bg-sky-100 text-sky-600 border-blue-400' : '' ?>">
                            <?= $totalPages ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-8 flex justify-end">
                <form id="search-form" action="<?= BASEURL ?>/Beranda/search" method="post">
                    <input
                        type="text"
                        id="search-input"
                        name="search"
                        placeholder="Cari berdasarkan nama atau judul..."
                        class="w-120 h-10 px-4 bg-white border-slate-300 text-slate-700 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500" />
                    <button type="submit" class="ml-2 px-8 py-2 bg-sky-800 text-white rounded-xl hover:bg-sky-600 transition">Cari</button>
                </form>
            </div>
        </div>
        <div id="table-container">
            <?php $this->view('Beranda/table_partial', $data); ?>
        </div>
    </div>
</main>
