<main class="p-8 overflow-y-auto flex-1">
    <div class="grid grid-cols-1 gap-8">
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="font-bold text-xl mb-2 text-slate-950">Berita dan Informasi</h2>

            <form action="<?= BASEURL; ?>/berita_controller/createBerita" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div class="my-3">
                        <label class="block text-lg font-medium mb-1 text-slate-950">Gambar ( 16:9 )</label>
                        <label for="gambar" class="cursor-pointer">
                            <div class="mb-4 rounded-xl overflow-hidden" id="preview-container">
                                <img
                                    id="gambar-preview"
                                    src="<?=BASEURL?>/src/assets/noPicture.png"
                                    alt="Gambar Berita"
                                    class="rounded-xl object-cover w-full h-[28.8rem]" />
                            </div>
                        </label>
                        <input
                            name="gambar"
                            id="gambar"
                            type="file"
                            class="hidden w-full border border-sky-400 hover:border-sky-800 p-2 rounded-lg text-slate-950"
                            accept="image/*"
                            onchange="return previewGambar(event)" />
                    </div>

                    <div>
                        <div class="my-3">
                            <label class="block text-lg font-medium mb-1 text-slate-950">Judul</label>
                            <input
                                name="judul"
                                id="judul"
                                spellcheck="false"
                                type="text"
                                class="w-full border border-sky-400 hover:border-sky-800 p-2 rounded-lg text-slate-950 font-medium" />
                        </div>

                        <div class="my-3">
                            <label class="block text-lg font-medium mb-1 text-slate-950">Deskripsi</label>
                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                spellcheck="false"
                                rows="14"
                                class="w-full border border-sky-400 hover:border-sky-800 p-[18px] rounded-lg text-slate-950 resize-none"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 mb-5 flex gap-4 w-full">
                    <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Batal</button>
                    <button type="submit" class="simpan-btn-berita bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Simpan</button>
                </div>
            </form>
        </div>

        <table class="w-full text-slate-800 border border-sky-800 rounded-lg overflow-hidden shadow-md my-4">
            <thead class="bg-sky-800 text-white">
                <tr>
                    <th class="pl-16 py-2 w-[3%] text-center">No</th>
                    <th class="px-6 py-2 w-[20%] text-center">Gambar</th>
                    <th class="px-6 py-2 w-[30%] text-left">Judul Berita</th>
                    <th class="px-4 py-2 w-[15%] text-center">Tanggal</th>
                    <th class="px-4 py-2 text-center">Author</th>
                    <th class="px-4 py-2 w-[5%] text-center">Ubah</th>
                    <th class="px-4 pr-16 py-2 w-[5%] text-center">Hapus</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                <?php if (!empty($data['dataBerita'])) : ?>
                <?php $no = 1;  ?>
                <?php foreach ($data['dataBerita'] as $berita): ?>
                <tr>
                    <td class="pl-16 py-4 w-[3%] text-center"><?= $no++ ?></td>
                    <td class="px-6 py-4 w-[20%] text-center">
                        <div class="w-3/4 rounded-xl overflow-hidden mx-auto">
                            <img
                                src="http://localhost/konoha/images/berita/<?= htmlspecialchars($berita['gambar']) ?>"
                                class="rounded-xl object-cover w-full" />
                        </div>
                    </td>
                    <td class="px-6 py-4 w-[30%]"><?= htmlspecialchars($berita['judul']) ?></td>
                    <td class="px-4 py-4 w-[15%] text-center"><?= htmlspecialchars($berita['tanggal_berita']) ?></td>
                    <td class="px-4 py-4 text-center"><?= htmlspecialchars($berita['id_admin']) ?></td>
                    <td class="px-4 py-4 w-[5%] justify-center text-center">
                        <a
                            href="<?=BASEURL?>/Berita_controller/detail/<?= $berita['id_berita'] ?>"
                            class="editBerita px-6 py-1 bg-sky-600 hover:bg-sky-700 rounded-xl flex-1 h-7 w-15 text-center text-white">
                            Edit
                        </a>
                    </td>
                    <td class="px-4 pr-16 py-4 w-[5%] justify-center text-center">
                        <a
                            href="<?=BASEURL?>/Berita_controller/deleteBerita/<?= $berita['id_berita'] ?>"
                            class="delete-btn-berita px-4 py-1 bg-red-700 hover:bg-red-800 rounded-xl flex-1 h-7 w-15 text-center text-white">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php else: ?>
                <tr>
                    <td colspan="4" class="py-4 px-6 text-center text-slate-500">Belum ada pengaduan yang selesai.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
