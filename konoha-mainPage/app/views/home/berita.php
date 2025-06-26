<!-- SECTION : BERITA START -->
<section id="berita">
    <!-- berita bacgkground -->
    <div class="bg-sky-100 pb-24">
        <div>
            <h1 class="section-title text-slate-700">Berita dan Informasi</h1>
        </div>
        <!-- berita swiper container -->
        <div class="swiper container mx-auto mb-8 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
            <div class="swiper-wrapper mb-1">
                <!-- slide 1 -->
                <?php if (!empty($data['berita'])) : ?>
                <?php foreach( $data['berita'] as $berita ) : ?>
                <div class="swiper-slide wow animate__animated animate__fadeInUp" data-wow-duration="1.5s" data-wow-offset="300">
                    <div class="group overflow-hidden bg-white rounded-xl hover:scale-95 transition-all duration-500">
                        <a href="<?= BASEURL ?>/Home_controller/detailBerita/<?= $berita['id_berita'] ?>">
                            <div class="overflow-hidden h-44 md:h-36 lg:h-56 xl:h-44">
                                <!-- source image -->
                                <img
                                    src="http://localhost/konoha/images/berita/<?= $berita['gambar'] ?>"
                                    class="w-full h-full object-cover hover:scale-110 transition-all duration-500 ease-in-out" />
                            </div>
                            <div class="mt-2 px-4 pb-4 flex flex-col h-20">
                                <h2 class="text-sm font-medium mb-1 line-clamp-2 text-ellipsis overflow-hidden">
                                    <?=$berita['judul']?>
                                </h2>
                                <h3 class="text-sm text-gray-600 mt-auto">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span class="mx-1"></span>
                                    <?php
                                        setlocale(LC_TIME, 'id_ID.utf8', 'id_ID', 'Indonesian_indonesia.1252');
                                        echo strftime('%A, %d %B %Y %H:%M', strtotime($berita['tanggal_berita']));
                                    ?>
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                <?php for($i = 0; $i < 4; $i++) : ?>
                <!-- slide 2 -->
                <div class="swiper-slide wow animate__animated animate__fadeInUp" data-wow-duration="1.5s" data-wow-offset="300">
                    <div class="group overflow-hidden bg-white rounded-xl hover:scale-95 transition-all duration-500">
                        <a href="">
                            <div class="overflow-hidden h-44 md:h-36 lg:h-56 xl:h-44">
                                <!-- source image -->
                                <img src="" class="w-full h-full object-cover hover:scale-110 transition-all duration-500 ease-in-out" />
                            </div>
                            <div class="mt-2 px-4 pb-4 flex flex-col h-20">
                                <h2 class="text-sm font-medium mb-1 line-clamp-2 text-ellipsis overflow-hidden">
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Incidunt, et.
                                </h2>
                                <h3 class="text-sm text-gray-600 mt-auto">
                                    <i class="fa-regular fa-calendar"></i>
                                    <span class="mx-1"></span>
                                    12 April 2021 10.00
                                </h3>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endfor; ?>
                <?php endif; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- SECTION : BERITA END -->
