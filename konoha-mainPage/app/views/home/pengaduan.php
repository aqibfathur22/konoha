<!-- SECTION : PENGADUAN START -->
<section id="pengaduan">
    <!-- pengaudan bg -->
    <div class="bg-white">
        <!-- pengaduan container -->
        <div class="container mx-auto px-2 pb-24 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
            <!-- pengaduan flexbox -->
            <div class="flex flex-col justify-center">
                <!-- element container -->
                <div>
                    <h1 class="section-title text-sky-500">Adukan Keluhanmu!</h1>
                </div>

                <form action="<?= BASEURL; ?>/home/createPengaduan" method="post" enctype="multipart/form-data">
                    <!-- input : nama -->
                    <div
                        class="input-animate mb-3 lg:mb-5 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="100ms">
                        <label for="nama" id="nama-label" class="mx-4 text-sm font-medium text-slate-700 label-lg">Nama</label>
                        <input
                            name="nama_pelapor"
                            type="text"
                            id="nama"
                            maxlength="50"
                            class="w-full h-10 px-6 mt-2 border-slate-300 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500"
                            required />
                    </div>
                    <!-- input : nomor telepon -->
                    <div
                        class="input-animate mb-3 lg:mb-5 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="200ms">
                        <label for="nomor" id="nomor-label" class="mx-4 text-sm font-medium text-slate-700 label-lg"> Nomor Telepon </label>
                        <input
                            name="nomor_telepon"
                            type="text"
                            id="nomor"
                            maxlength="20"
                            onkeypress="return onlyNumeric(event)"
                            class="w-full h-10 px-6 mt-2 border-slate-300 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500"
                            required />
                    </div>
                    <!-- input : kategori pengaduan -->
                    <div
                        class="input-animate mb-3 lg:mb-5 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="300ms">
                        <label for="id_kategori" class="mx-4 text-sm font-medium text-slate-700 label-lg">Kategori Pengaduan</label>
                        <div id="custom-select-kategori" class="relative w-full mt-2" tabindex="0">
                            <input type="hidden" name="id_kategori" id="id_kategori" required />
                            <button
                                type="button"
                                class="w-full h-10 px-6 border-slate-300 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500 flex justify-between items-center bg-white"
                                id="kategori-selected">
                                <span id="kategori-selected-text" class="text-slate-400">Pilih Kategori</span>
                                <i id="icon-dropdown" class="fa-solid fa-caret-down fa-xl text-slate-400" required></i>
                            </button>
                            <div
                                id="kategori-options"
                                class="absolute z-10 left-0 right-0 mt-1 bg-white border border-slate-300 rounded-xl shadow-lg max-h-60 overflow-auto hidden">
                                <?php foreach ($data['kategori'] as $category) : ?>
                                <div
                                    class="px-6 py-2 text-sm text-slate-700 hover:bg-sky-100 cursor-pointer"
                                    data-value="<?= $category['id_kategori'] ?>">
                                    <?= htmlspecialchars($category['nama_kategori']) ?>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- input : judul pengaduan -->
                    <div
                        class="input-animate mb-3 lg:mb-5 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="100ms">
                        <label for="nama" id="nama-label" class="mx-4 text-sm font-medium text-slate-700 label-lg">Judul pengaduan</label>
                        <input
                            name="judul_pengaduan"
                            type="text"
                            maxlength="70"
                            id="nama"
                            class="w-full h-10 px-6 mt-2 border-slate-300 text-sm border-2 rounded-xl focus:outline-none focus:border-sky-500"
                            required />
                    </div>
                    <!-- input : Pengaduan -->
                    <div
                        class="input-animate mb-2 lg:mb-4 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="400ms">
                        <label for="nama" id="nama-label" class="mx-4 text-sm font-medium text-slate-700 label-lg">Pengaduan</label>
                        <textarea
                            name="detail_pengaduan"
                            id="pengaduan"
                            class="w-full h-52 lg:60 px-6 py-4 mt-2 border-slate-300 text-sm lg:text-base border-2 rounded-xl focus:outline-none focus:border-sky-500 resize-none"
                            required></textarea>
                    </div>
                    <!-- input : lampiran -->
                    <div
                        class="input-animate mb-3 lg:mb-5 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="500ms">
                        <label class="mx-4 text-sm font-medium text-slate-700 label-lg">Lampiran</label>

                        <div class="relative mt-2 w-full">
                            <input
                                name="path_lampiran"
                                type="file"
                                id="lampiran"
                                class="absolute px-6 py-[0.5rem] h-full w-full text-sm lg:text-base text-slate-400 cursor-pointer active:border-2 active:border-sky-500 active:rounded-xl" />
                            <div class="h-10 lg:h-10 flex items-center justify-end border-2 border-slate-300 rounded-xl px-6 py-2">
                                <i class="fa-regular fa-file fa-md text-slate-400"></i>
                            </div>
                        </div>
                    </div>
                    <!-- submit button -->
                    
                    <div
                        class="input-animate my-8 wow animate__animated animate__fadeInUp"
                        data-wow-duration="700ms"
                        data-wow-delay="600ms">
                        <button
                            type="submit"
                            class="w-full h-10 px-6 mt-2 bg-sky-500 text-white text-sm rounded-xl hover:bg-sky-600 transition-all duration-500 ease-in-out cursor-pointer input-lg">
                            Kirim Aduanmu!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- SECTION : PENGADUAN END -->
