<section class="bg-footer">
    <!-- SECTION : PROFIL START -->
    <section id="profil">
        <div>
            <div class="container mx-auto mb-28 p-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
                <div>
                    <div>
                        <h1 class="section-title text-sky-500">Pofil Desa Konoha</h1>
                    </div>

                    <?php foreach($data['profil'] as $profil) : ?>
                    <div class="lg:flex lg:flex-row lg:gap-16">
                        <div
                            class="group overflow-hidden h-96 lg:w-1/2 mb-12 rounded-xl hover:scale-95 transition-all duration-500 ease-in-out wow animate__animated animate__fadeInLeft"
                            data-wow-duration="1.5s"
                            data-wow-delay="0ms"
                            data-wow-offset="300">
                            <img
                                src="http://localhost/konoha/images/profil/<?= htmlspecialchars ($profil['gambar'])?>"
                                class="mx-auto object-cover w-full h-full rounded-xl hover:scale-110 transition-all duration-500 ease-in-out" />
                        </div>
                        <div
                            class="lg:w-1/2 wow animate__animated animate__fadeInRight"
                            data-wow-duration="1.5s"
                            data-wow-delay="0ms"
                            data-wow-offset="300">
                            <p class="text-sm lg:text-base xl:text-lg font-medium text-justify">
                                <?=$profil['deskripsi']?>
                            </p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- SECTION : PROFIL END -->
