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
                        <th class="pl-16 py-2 w-96 text-left">Nomor </th>
                        <th class="pl-16 py-2 w-96 text-left">Nama Kategori</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php if (!empty($data['dataKategori'])) : ?>
                        <?php foreach ($data['dataKategori'] as $kategori) : ?>
                        <tr>
                            <td class="pl-16 py-4 w-1/10 text-center"><?= htmlspecialchars($kategori['id_kategori']) ?></td>
                            <td class="pl-16 py-4 w-9/10"><?= htmlspecialchars($kategori['nama_kategori']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>    
            </table>
        </div>
</main>