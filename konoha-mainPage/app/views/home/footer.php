    <!-- FOOTER START -->
    <footer>
        <div class="container mx-auto px-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
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
                                <a href="<?= BASEURL; ?>/Home_controller#beranda">Beranda</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/Home_controller#pengaduan">Pengaduan</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/Home_controller#berita">Berita dan Informasi</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/Home_controller#profil">Profil Desa Konoha</a>
                            </li>
                            <li>
                                <a href="<?= BASEURL; ?>/Statistik_controller">Statistik</a>
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
    <!-- FOOTER END -->
</section>
