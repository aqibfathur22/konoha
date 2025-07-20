<?php
function waktuSejak($timestamp) {
    $selisih = time() - $timestamp;
    if ($selisih < 60) return $selisih . ' detik yang lalu';
    elseif ($selisih < 3600) return floor($selisih / 60) . ' menit yang lalu';
    elseif ($selisih < 86400) return floor($selisih / 3600) . ' jam yang lalu';
    else return floor($selisih / 86400) . ' hari yang lalu';
}
?>

<main class="bg-slate-100 flex-1 overflow-y-auto p-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white lg:col-span-1 p-4 rounded-lg shadow-md">
            <div class="flex flex-col items-center gap-3">
                <div class="mt-3">
                    <i class="fa-solid fa-circle-user text-8xl text-slate-700"></i>
                </div>
                <div class="font-bold text-xl text-slate-950">
                    <?= $_SESSION['user']['nama'] ?? 'Admin' ?>
                </div>
                <p class="text-sm text-slate-950 text-center -mt-1">
                    Terakhir masuk <?= isset($_SESSION['login_time']) ? waktuSejak($_SESSION['login_time']) : 'baru saja' ?>
                </p>
                <div class="flex items-center gap-3 text-sm mb-5 cursor-default">
                    <div id="idPengguna" class="bg-sky-200 px-3 py-1 rounded-full truncate text-slate-950">
                        pengguna_<?= $_SESSION['user']['id_admin'] ?>
                    </div>
                    <button 
                        type="button"
                        onclick="salinID()"
                        class="text-sm px-3 py-1 bg-sky-600 text-white rounded-full hover:bg-sky-700 transition">
                        salin
                    </button>
                </div>

                <form action="<?= BASEURL ?>/Pengguna/gantiPassword" method="POST" class="w-full space-y-3">
                    <input type="hidden" name="id_admin" value="<?= $data['editProfil']['id_admin'] ?>">
                    <div>
                        <label class="block text-sm font-medium text-slate-950">Kata Sandi Lama</label>
                        <input 
                            type="password" 
                            name="password_lama"
                            class="w-full bg-sky-200 p-2 rounded-lg text-slate-950" 
                            required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-950">Kata Sandi Baru</label>
                        <input 
                            type="password" 
                            name="password_baru"
                            class="w-full bg-sky-200 p-2 rounded-lg text-slate-950" 
                            required />
                    </div>
                    <button type="submit" class="w-full bg-sky-600 hover:bg-sky-700 text-white rounded-lg py-2 mt-2">
                        <i class="fas fa-lock mr-1"></i> Ganti Sandi
                    </button>
                </form>
            </div>
        </div>

        <!-- Form Edit Profil -->
        <div class="lg:col-span-2 flex flex-col gap-6">
            <form action="<?= BASEURL ?>/Pengguna/updatePengguna" method="POST">
                <input type="hidden" name="id_admin" value="<?= $data['editProfil']['id_admin'] ?>">
                <div class="bg-white rounded-lg p-4 shadow-md">
                    <h2 class="font-bold text-lg mb-7 text-slate-950">Edit Informasi Pribadi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium mb-1 text-slate-950">Nama Depan</label>
                            <input 
                                type="text" 
                                name="nama_depan"
                                value="<?= $data['editProfil']['nama_depan'] ?>"
                                class="w-full bg-sky-200 p-2 rounded-lg text-slate-950"
                                required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1 text-slate-950">Nama Belakang</label>
                            <input
                                type="text"
                                name="nama_belakang"
                                value="<?= $data['editProfil']['nama_belakang'] ?>"
                                class="w-full bg-sky-200 p-2 rounded-lg text-slate-950"
                                required />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium mb-1 text-slate-950">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="<?= $data['editProfil']['email'] ?>"
                                class="w-full bg-sky-200 p-2 rounded-lg text-slate-950"
                                required />
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 justify-end mt-5">
                    <button type="submit" class="w-full bg-sky-600 text-white py-2 rounded-lg hover:bg-sky-700 transition duration-300">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
<script src="<?= BASEURL ?>/js/script.js"></script>
