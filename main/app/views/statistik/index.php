<?php // app/views/statistik/index.php ?>
<section id="statistik" class="py-20 bg-white">
    <div class="container mx-auto px-2 mb-24 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-sky-500">Statistik Pengaduan</h2>
            <form action="" method="post">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <button
                        name="total"
                        cursor="pointer"
                        class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                        <h3 class="text-lg font-semibold text-slate-700">Total Pengaduan</h3>
                        <p class="text-4xl font-bold text-indigo-600 mt-2">
                            <?= $data['dataStatistik']['total'] ?? 0 ?>
                        </p>
                    </button>
                    <button
                        name="menunggu"
                        class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                        <h3 class="text-lg font-semibold text-slate-700">Menunggu</h3>
                        <p class="text-4xl font-bold text-yellow-500 mt-2">
                            <?= $data['dataStatistik']['menunggu'] ?? 0 ?>
                        </p>
                    </button>
                    <button
                        name="diproses"
                        cursor="pointer"
                        class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                        <h3 class="text-lg font-semibold text-slate-700">Diproses</h3>
                        <p class="text-4xl font-bold text-blue-500 mt-2">
                            <?= $data['dataStatistik']['diproses'] ?? 0 ?>
                        </p>
                    </button>
                    <button
                        name="selesai"
                        cursor="pointer"
                        class="hover:scale-103 focus:bg-sky-50 bg-white rounded-2xl shadow-lg p-6 border-2 border-slate-100 hover:shadow-xl transition-all duration-700 ease-in-out">
                        <h3 class="text-lg font-semibold text-slate-700">Selesai</h3>
                        <p class="text-4xl font-bold text-green-500 mt-2">
                            <?= $data['dataStatistik']['selesai'] ?? 0 ?>
                        </p>
                    </button>
                </div>
            </form>
            
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
                <div class="mb-8 flex justify-end">
                    <form id="search-form" action="<?= BASEURL ?>/Statistik/search" method="post">
                        <input
                            type="text"
                            id="search-input"
                            name="search"
                            placeholder="Cari berdasarkan nama atau judul..."
                            class="w-80 h-10 px-4 border-slate-300 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500" />
                        <button type="submit" class="ml-2 px-4 py-2 bg-sky-500 text-white rounded-xl hover:bg-sky-600 transition">Cari</button>
                    </form>
                </div>
            </div>

            <div id="table-container">
                <?php $this->view('statistik/table_partial', $data); ?>
            </div>
        </div>
    </div>
</section>

<footer class="bg-footer w-full">
    <div class="container pt-20 mx-auto px-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
        <div class="bg-sky-500 lg:px-10 xl:px-20 pt-2 lg:pt-4 xl:pt-8 pb-6 lg:pb-8 xl:pb-12 rounded-xl">
            <!-- flex while display md -->
            <div class="md:flex md:flex-row lg:gap-20">
                <!-- flex between addreess and contact -->
                <div class="flex flex-col md:w-[70%] lg:w-[55%] xl:w-[70%]">
                    <!-- Address -->
                    <div class="flex mx-6 pt-6 mb-4">
                        <div class="w-[60%] md:w-[50%] lg:w-[40%] xl:w-[25%] xl:mr-8 mr-4 mt-2">
                            <img src="<?=BASEURL?>/src/assets/logo.jpeg" class="rounded-full" />
                        </div>
                        <div class="flex flex-col">
                            <h2 class="font-normal xl:font-semibold text-sm lg:text-lg text-white mb-1">Pemerintah Desa Konoha</h2>
                            <p class="xl:w-[70%] font-light xl:font-normal text-xs lg:text-base text-white">
                                Jl. Perdamaian 3 No.666, Desa Konoha, Kecamatan Fracture, Kabupaten Ascent, Provinsi Icebox
                            </p>
                        </div>
                    </div>
                    <!-- Contact -->
                    <div class="mx-6 pt-5 mb-4">
                        <h2 class="font-normal xl:font-semibold text-sm lg:text-lg text-white mb-4">Hubungi Kami</h2>
                        <div class="flex flex-row items-center gap-3 ml-2 mb-4">
                            <i class="fa-solid fa-phone text-white text-sm lg:text-base xl:text-xl"></i>
                            <h3 class="text-white font-light xl:font-normal text-xs lg:text-base tracking-wide">+62 8966677788</h3>
                        </div>
                        <div class="flex flex-row items-center gap-3 ml-2 mb-6">
                            <i class="fa-solid fa-envelope text-white text-sm lg:text-base xl:text-xl"></i>
                            <h3 class="text-white font-light xl:font-normal text-xs lg:text-base tracking-wide">konoha@konoha.com</h3>
                        </div>
                        <div class="flex flex-row items-center gap-3 lg:gap-5 ml-2">
                            <a href="">
                                <img src="<?=BASEURL?>/src/assets/icon/instagram.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="<?=BASEURL?>/src/assets/icon/youtube.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="<?=BASEURL?>/src/assets/icon/x.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="<?=BASEURL?>/src/assets/icon/facebook.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="<?=BASEURL?>/src/assets/icon/tiktok.svg" class="w-8 lg:w-12" />
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Menu -->
                <div class="mx-6 pt-5 mb-4 md:w-[30%] lg:w-[35%] xl:2-[30%]">
                    <h2 class="font-normal xl:font-semibold text-sm lg:text-lg text-white mb-3 lg:mb-5">Menu Utama</h2>
                    <div class="flex flex-col gap-4 text-white font-light xl:font-normal text-xs lg:text-base ml-2">
                        <li>
                            <a href="<?= BASEURL; ?>/Home#beranda">Beranda</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/Home#pengaduan">Pengaduan</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/Home#berita">Berita dan Informasi</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/Home#profil">Profil Desa Konoha</a>
                        </li>
                        <li>
                            <a href="<?= BASEURL; ?>/Statistik">Statistik</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3 lg:pt-5 pb-4 lg:bt-5">
        <h4 class="text-slate-700 text-xs lg:text-base text-center font-light">copyright 2025 Pemerintah Desa Konoha</h4>
    </div>
</footer>
