<main class="p-4 overflow-y-auto flex-1">
    <div class="grid grid-cols-1 mt-5">
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="font-bold text-xl text-slate-950 mb-6">Statistik</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-4 border rounded-lg shadow-sm h-full">
                    <div class="grid grid-cols-3 gap-2 text-slate-800">
                        <p class="font-semibold">Nama Pelapor</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['nama_pelapor'] ?></p>

                        <p class="font-semibold">Nomor Hp</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['nomor_telepon'] ?></p>

                        <p class="font-semibold">Kategori Aduan</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['nama_kategori'] ?></p>

                        <p class="font-semibold">Judul Aduan</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['judul_pengaduan'] ?></p>

                        <p class="font-semibold">Aduan</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['detail_pengaduan'] ?></p>

                        <p class="font-semibold">Tanggal</p>
                        <p class="col-span-2"><?= $data['detailPengaduan']['tanggal_dikirim'] ?></p>
                    </div>
                </div>

                <div class="bg-white p-4 border rounded-lg shadow-sm h-full">
                    <p class="font-semibold text-center text-slate-800 mb-4">Lampiran:</p>
                    <div class="flex justify-center">
                        <img
                            src="http://localhost/konoha/images/pengaduan/<?= $data['detailPengaduan']['path_lampiran'] ?>"
                            alt="Lampiran"
                            class="max-w-full max-h-64 object-contain border rounded" />
                    </div>
                </div>
            </div>

            <form action="<?= BASEURL ?>/Beranda_controller/updateStatus" method="post">
                <input type="hidden" name="id_pengaduan" value="<?= $data['detailPengaduan']['id_pengaduan'] ?>" />

                <div class="flex gap-4 w-full mt-8">
                    <button type="submit" name="status" value="menunggu"
                        class="flex-1 bg-sky-600 hover:bg-sky-700 text-white py-2 rounded-lg text-center">
                        Menunggu
                    </button>
                    <button type="submit" name="status" value="diproses"
                        class="flex-1 bg-sky-600 hover:bg-sky-700 text-white py-2 rounded-lg text-center">
                        Diproses
                    </button>
                    <button type="submit" name="status" value="selesai"
                        class="flex-1 bg-sky-600 hover:bg-sky-700 text-white py-2 rounded-lg text-center">
                        Selesai
                    </button>
                    <button type="submit" name="status" value="ditolak"
                        class="flex-1 bg-sky-600 hover:bg-sky-700 text-white py-2 rounded-lg text-center">
                        Ditolak
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
