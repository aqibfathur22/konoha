<!-- Statistics Section -->
<section class="py-12 bg-sky-50 pt-18 pb-28">
    <div class="container mx-auto px-4 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
        <h2
            class="text-center text-xl lg:text-3xl font-medium text-sky-500 mb-12 wow animate__animated animate__fadeInUp"
            data-wow-duration="1.5s"
            data-wow-offset="300">
            Statistik Pengaduan
        </h2>

        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-700 ease-in-out wow animate__animated animate__fadeInUp"
                data-wow-duration="1.5s"
                data-wow-offset="300">
                <h3 class="text-3xl font-bold text-sky-600 mb-2"><?= $data['dataStatistik']['total'] ?? 0 ?></h3>
                <p class="text-slate-700 font-medium">Total Pengaduan</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-700 ease-in-out wow animate__animated animate__fadeInUp"
                data-wow-duration="1.5s"
                data-wow-offset="300"
                data-wow-delay="100ms">
                <h3 class="text-3xl font-bold text-yellow-500 mb-2"><?= $data['dataStatistik']['menunggu'] ?? 0 ?></h3>
                <p class="text-slate-700 font-medium">Menunggu</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-700 ease-in-out wow animate__animated animate__fadeInUp"
                data-wow-duration="1.5s"
                data-wow-offset="300"
                data-wow-delay="200ms">
                <h3 class="text-3xl font-bold text-blue-600 mb-2"><?= $data['dataStatistik']['diproses'] ?? 0 ?></h3>
                <p class="text-slate-700 font-medium">Diproses</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-700 ease-in-out wow animate__animated animate__fadeInUp"
                data-wow-duration="1.5s"
                data-wow-offset="300"
                data-wow-delay="300ms">
                <h3 class="text-3xl font-bold text-green-600 mb-2"><?= $data['dataStatistik']['selesai'] ?? 0 ?></h3>
                <p class="text-slate-700 font-medium">Selesai</p>
            </div>
        </div>
    </div>
</section>
