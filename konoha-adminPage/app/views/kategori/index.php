<main class="p-4 overflow-y-auto flex-1">
    <div class="bg-slate-50 border rounded-lg p-4 shadow-md mt-5">
        <div class="mt-5 mb-12">
            <form action="<?= BASEURL ?>/Kategori_controller/createKategori" method="post">
                <div>
                    <label class="block text-lg font-medium mb-1 text-slate-950"></label>
                    <input
                        name="nama_kategori"
                        type="text"
                        placeholder="Tambah Kategori"
                        class="w-full border border-sky-400 hover:border-sky-800 p-2 rounded-lg text-slate-950" />
                </div>

                <div class="flex gap-4 w-full mt-4">
                    <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Batal</button>
                    <button type="submit" class="bg-sky-600 hover:bg-sky-700 rounded-lg flex-1 h-10 text-center text-white">Simpan</button>
                </div>
            </form>
        </div>

        <table class="w-full text-slate-800 border border-sky-800 rounded-lg overflow-hidden shadow-md mb-4">
            <thead class="bg-sky-800 text-white">
                <tr>
                    <th class="pl-16 py-2 w-[10%] text-center">Nomor</th>
                    <th class="pl-16 py-2 w-[60%] text-left">Nama Kategori</th>
                    <th class="pr-16 py-2 w-[15%] text-cenrer">Hapus</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-slate-200">
                <?php $no = 1 ?>
                <?php if (!empty($data['dataKategori'])) : ?>
                <?php foreach ($data['dataKategori'] as $kategori) : ?>
                <tr>
                    <td class="pl-16 py-4 w-[10%] text-center"><?= $no++ ?></td>
                    <td class="pl-16 py-4 w-[60%]"><?= htmlspecialchars($kategori['nama_kategori']) ?></td>
                    <td class="pr-16 py-2 w-[15%] justify-center text-center">
                        <a
                            href="<?=BASEURL?>/Kategori_controller/deleteKategori/<?= $kategori['id_kategori'] ?>"
                            class="delete-btn-kategori px-4 py-1 bg-red-700 hover:bg-red-800 rounded-xl flex-1 h-7 w-15 text-center text-white">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
