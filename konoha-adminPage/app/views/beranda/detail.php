<main class="p-4 overflow-y-auto flex-1">
    <div class="grid grid-cols-1 mt-5">
        <div class="bg-slate-50 rounded-lg p-4 shadow-md">
            <h2 class="font-bold text-xl mb-5 text-slate-950">Statistik</h2>

            <div class="mt-8 space-y-4">
                <div class="rounded-lg p-12 bg-white text-slate-800 shadow-md">
                    <div class="flex gap-10 justify-between">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-white p-4 border rounded-lg shadow-sm">
                                <div class="grid grid-cols-3 gap-2 text-slate-800">
                                <p class="font-semibold">Nama Pelapor </p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['nama_pelapor'] ?></p>

                                <p class="font-semibold text-left">Nomor Hp </p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['nomor_telepon'] ?></p>

                                <p class="font-semibold text-left">Kategori Aduan </p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['nama_kategori'] ?></p>

                                <p class="font-semibold text-left">Judul Aduan </span></p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['judul_pengaduan'] ?></p>

                                <p class="font-semibold text-left">Aduan </p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['detail_pengaduan'] ?></p>

                                <p class="font-semibold text-left">Tanggal </p>
                                <p class="col-span-2"><?= $data['detailPengaduan']['tanggal_dikirim'] ?></p>
                                </div>
                            </div>

                            <div class="bg-white p-4 border rounded-lg shadow-sm">  
                                <p class="font-semibold text-center text-slate-800 mb-4">Lampiran:</p>
                                <div class="flex justify-center">
                                <img 
                                    src="http://localhost/konoha/images/pengaduan/<?= $data['detailPengaduan']['path_lampiran'] ?>" 
                                    alt="Lampiran" 
                                    class="max-w-full max-h-64 object-contain border rounded">
                            </div>
                        </div>
                    </div>             
                </div>
            </div>

            <div class="flex gap-4 w-full my-8">
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Pending</button>
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Diproses</button>
                <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Selesai</button>
            </div>
        </div>
    </div>
</main>
