<!-- SECTION : BERITA START -->
<section>
    <!-- berita background -->
    <div class="bg-white">
        <!-- berita container -->
        <div class="container mx-auto px-2 pt-12 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
            <div class="flex flex-col gap-4 mt-32 lg:mt-44 lg:gap-6 mb-4 lg:mb-6">
                <!-- title -->
                <div class="lg:max-w-[70%]">
                    <h1 class="text-xl lg:text-3xl xl:text-4xl font-semibold text-slate-700">
                        <?= $data['detailBerita']['judul'] ?>
                    </h1>
                </div>

                <div class="flex flex-col gap-2">
                    <!-- author -->
                    <div class="flex items-center gap-3">
                        <i class="fa-regular fa-user text-xs lg:text-sm text-slate-700"></i>
                        <span class="text-xs lg:text-sm font-medium text-slate-700">Paul McCartney</span>
                    </div>
                    <!-- date time -->
                    <div class="flex items-center gap-3">
                        <i class="fa-regular fa-calendar text-xs lg:text-sm text-slate-700"></i>
                        <span class="text-xs lg:text-sm font-medium text-slate-700">
                            <?php 
                                setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'Indonesian_indonesia.1252');
                                echo strftime('%A, %d %B %Y %H:%M', strtotime($data['detailBerita']['tanggal_berita'])) 
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <!-- berita flex row -->
            <div class="flex flex-col lg:flex-row gap-6 lg:gap-8 justify-between mb-6">
                <!-- berita read -->
                <div class="flex flex-col gap-4 lg:gap-6 mb-8 lg:w-[75%]">
                    <!-- image -->
                    <div class="rounded-lg overflow-hidden">
                        <img src="http://localhost/konoha/images/berita/<?= $data['detailBerita']['gambar'] ?>" class="hover:scale-105 transition-all duration-700 ease-in-out" />
                    </div>
                    <!-- fill -->
                    <div class="flex flex-col gap-4 lg:gap-6">
                        <p class="text-sm lg:text-lg text-slate-700 text-justify">
                            <?= nl2br(htmlspecialchars($data['detailBerita']['deskripsi'])) ?>
                        </p>
                    </div>
                </div>
                <div class="flex flex-col gap-8 lg:w-[25%]">
                    <!-- berita sugestion -->
                    <?php foreach( $data['berita'] as $berita ) :?>
                    <a href="<?= BASEURL ?>/Home_controller/detailBerita/<?= $berita['id_berita'] ?>">
                        <div
                            class="flex flex-col gap-3 p-5 lg:p-4 bg-white shadow-black/20 shadow-md ring-2 ring-slate-200/50 rounded-lg">
                            <div class="overflow-hidden rounded-lg h-44">
                                <img
                                    src="http://localhost/konoha/images/berita/<?= $berita['gambar'] ?>"
                                    class="object-cover w-full h-full hover:scale-110 transition-all duration-700 ease-in-out" />
                            </div>
                            <div class="h-16 lg:h-24 flex flex-col">
                                <h2
                                    class="text-base lg:text-lg font-medium text-slate-700 line-clamp-3 text-ellipsis overflow-hidden">
                                    <?=$berita['judul']?>
                                </h2>
                            </div>
                            <!-- date time -->
                            <div class="flex items-center gap-3">
                                <i class="fa-regular fa-calendar text-sm text-slate-700 mt-auto"></i>
                                <span class="text-sm text-slate-700">
                                <?php
                                        setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'Indonesian_indonesia.1252');
                                        echo strftime('%A, %d %B %Y %H:%M', strtotime($berita['tanggal_berita']));
                                    ?>
                                <span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- berita container -->
</section>
<!-- SECTION : BERITA END -->

<!-- FOOTER START -->
<footer class="bg-footer w-full">
    <!-- footer container -->
    <div class="container mx-auto pt-16 lg:pt-24 px-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
        <div class="bg-sky-500 lg:px-10 xl:px-20 pt-2 lg:pt-4 xl:pt-8 pb-6 lg:pb-8 xl:pb-12 rounded-xl">
            <!-- flex while display md -->
            <div class="md:flex md:flex-row lg:gap-20">
                <!-- flex between addreess and contact -->
                <div class="flex flex-col md:w-[70%] lg:w-[55%] xl:w-[70%]">
                    <!-- Address -->
                    <div class="flex mx-6 pt-6 mb-4">
                        <div class="w-[60%] md:w-[50%] lg:w-[40%] xl:w-[25%] xl:mr-8 mr-4 mt-2">
                            <img src="src/assets/logo.jpeg" class="rounded-full" />
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
                            <h3 class="text-white font-light xl:font-normal text-xs lg:text-base tracking-wide">
                                konoha@konoha.com
                            </h3>
                        </div>
                        <div class="flex flex-row items-center gap-3 lg:gap-5 ml-2">
                            <a href="">
                                <img src="icon/instagram.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="icon/youtube.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="icon/x.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="icon/facebook.svg" class="w-8 lg:w-12" />
                            </a>
                            <a href="">
                                <img src="icon/tiktok.svg" class="w-8 lg:w-12" />
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Menu -->
                <div class="mx-6 pt-5 mb-4 md:w-[30%] lg:w-[35%] xl:2-[30%]">
                    <h2 class="font-normal xl:font-semibold text-sm lg:text-lg text-white mb-3 lg:mb-5">Menu Utama</h2>
                    <div class="flex flex-col gap-4 text-white font-light xl:font-normal text-xs lg:text-base ml-2">
                        <li>
                            <a href="#beranda" onclick="moveToBeranda()">Beranda</a>
                        </li>
                        <li>
                            <a href="#pengaduan" onclick="moveToPengaduan()">Pengaduan</a>
                        </li>
                        <li>
                            <a href="#berita" onclick="moveToBerita()">Berita dan Informasi</a>
                        </li>
                        <li>
                            <a href="#profil" onclick="moveToProfil()">Profil Desa Konoha</a>
                        </li>
                        <li>
                            <a href="keuangan.html">Keuangan</a>
                        </li>
                        <li>
                            <a href="demografi.html">Demografi</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-3 lg:pt-5 pb-4 lg:bt-5">
            <h4 class="text-slate-700 text-xs lg:text-base text-center font-light">copyright 2025 Pemerintah Desa Konoha</h4>
        </div>
    </div>
</footer>
<!-- FOOTER END -->