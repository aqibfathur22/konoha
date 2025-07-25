<main class="flex-1 overflow-y-auto p-4">
    <div class="grid grid-cols-1 gap-8">
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="font-bold text-xl mb-2 text-slate-950">Edit Berita</h2>

            <form action="<?= BASEURL; ?>/Berita/updateBerita" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div class="my-3">

                        <input type="hidden" name="id_berita" value="<?= $data['detailBerita']['id_berita']; ?>" />


                        <label class="block text-lg font-medium mb-1 text-slate-950">Gambar ( 16:9 )</label>

                        <label for="gambar" class="cursor-pointer">
                            <div class="mb-4 rounded-xl overflow-hidden" id="preview-container">
                                <?php if (!empty($data['detailBerita']['gambar'])): ?>
                                <img
                                    class="rounded-xl object-cover w-full h-[28.8rem]"
                                    id="gambar-preview"
                                    src="http://localhost/konoha/images/berita/<?= htmlspecialchars($data['detailBerita']['gambar']) ?>"
                                    alt="Gambar Berita"
                                    class="max-w-xs rounded border" />
                                <?php else: ?>
                                <img
                                    id="gambar-preview"
                                    src="<?=BASEURL?>/src/assets/noPicture.png"
                                    alt="Gambar Berita"
                                    class="rounded-xl object-cover w-full h-[28.8rem]" />
                                <?php endif; ?>
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
                                value="<?= $data['detailBerita']['judul'] ?>"
                                class="w-full border border-sky-400 hover:border-sky-800 p-2 rounded-lg text-slate-950 font-medium" />
                        </div>

                        <div class="my-3">
                            <label class="block text-lg font-medium mb-1 text-slate-950">Author</label>
                            <input
                                name="author"
                                id="judul"
                                spellcheck="false"  
                                type="text"
                                value="<?= $data['detailBerita']['author'] ?>"
                                class="w-full border border-sky-400 hover:border-sky-800 p-2 rounded-lg text-slate-950" />
                        </div>

                        <div class="my-3">
                            <label class="block text-lg font-medium mb-1 text-slate-950">Deskripsi</label>
                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                spellcheck="false"
                                rows="10"
                                class="w-full border border-sky-400 hover:border-sky-800 p-[22px] rounded-lg text-slate-950 resize-none"><?= htmlspecialchars(trim($data['detailBerita']['deskripsi'])) ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex gap-4 w-full">
                    <a
                        href="<?= BASEURL; ?>/Berita"
                        class="flex items-center justify-center bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white"
                        >Batal</a>
                    <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>
