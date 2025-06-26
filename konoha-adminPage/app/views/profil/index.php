<main class="main flex-1 overflow-y-auto p-4">
    <div class="grid grid-cols-1">
        <div class="bg-white border rounded-lg p-4 border-sky-800">
            <h2 class="font-bold text-xl mb-5 text-slate-950">Profil Desa</h2>

            <div class="grid grid-cols-2 gap-12">
                <?php foreach($data['dataProfil'] as $d) : ?>
                <div class="my-3">
                    <?php if(!empty($d['gambar'])) : ?>
                    <img 
                        src="http://localhost/konoha/images/profil/<?= htmlspecialchars($d['gambar']) ?>"
                        alt="Gambar profil"
                        class="rounded-xl object-cover w-full h-[34rem]" />>
                    <?php else : ?>
                    <img
                        src="<?=BASEURL?>/src/assets/noPicture.png"
                        alt="Gambar profil"
                        class="rounded-xl object-cover w-full h-[34rem]" />
                    <?php endif; ?>
                </div>

                <div class="my-3">
                    <p class="text-slate-700 font-medium text-lg"><?=$d['deskripsi']?></p>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="w-full">
                <a
                    href="<?=BASEURL?>/Profil_controller/editProfil/<?= $d['id_profil'] ?>"
                    class="editProfil py-1 w-full bg-sky-600 hover:bg-sky-700 rounded-xl flex items-center justify-center h-10 text-center text-white">
                    Edit
                </a>
            </div>
        </div>
    </div>
</main>
