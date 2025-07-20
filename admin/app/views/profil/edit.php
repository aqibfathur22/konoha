<main class="main flex-1 overflow-y-auto p-8">
    <div class="grid grid-cols-1">
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="font-bold text-xl mb-5 text-slate-950">Profil Desa</h2>

            <form action="<?= BASEURL; ?>/Profil/updateProfil" method="post" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div class="my-3">

                        <input type="hidden" name="id_profil" value="<?= $data['editProfil']['id_profil']; ?>" />


                        <label class="block text-lg font-medium mb-1 text-slate-950">Gambar</label>

                        <label for="gambar" class="cursor-pointer">
                            <div class="mb-4 rounded-xl overflow-hidden" id="preview-container">
                                <?php if (!empty($data['editProfil']['gambar'])): ?>
                                <img
                                    class="rounded-xl object-cover w-full h-[34rem]"
                                    id="gambar-preview"
                                    src="http://localhost/konoha/images/profil/<?= htmlspecialchars($data['editProfil']['gambar']) ?>"
                                    alt="Gambar profil"
                                    class="max-w-xs rounded border" />
                                <?php else: ?>
                                <img
                                    id="gambar-preview"
                                    src="<?=BASEURL?>/src/assets/noPicture.png"
                                    alt="Gambar profil"
                                    class="rounded-xl object-cover w-full h-[34rem]" />
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
                
                    <div class="my-3">
                        <label class="block text-lg font-medium mb-1 text-slate-950">Deskripsi</label>
                        <textarea
                            name="deskripsi"
                            id="deskripsi"
                            spellcheck="false"
                            rows="21"
                            class="w-full border border-sky-400 hover:border-sky-800 p-[18px] rounded-lg text-slate-950 resize-none"><?= htmlspecialchars(trim($data['editProfil']['deskripsi'])) ?></textarea>
                    </div>
                </div>

                <div class="mt-8 flex gap-4 w-full">
                    <a
                        href="<?= BASEURL; ?>/Beranda"
                        class="flex items-center justify-center bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white"
                        >Batal</a>
                    <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</main>
