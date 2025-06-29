<!-- SECTION : BERITA START -->
<section>
    <!-- berita background -->
    <div class="bg-white">
        <!-- berita container -->
        <div class="container mx-auto px-2 pt-12 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl mb-24">
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
                        <span class="text-xs lg:text-sm font-medium text-slate-700"><?= $data['detailBerita']['author'] ?></span>
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
