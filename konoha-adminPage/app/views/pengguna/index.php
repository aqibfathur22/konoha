<?php
function waktuSejak($timestamp) {
    $selisih = time() - $timestamp;

    if ($selisih < 60) {
        return $selisih . ' detik yang lalu';
    } elseif ($selisih < 3600) {
        return floor($selisih / 60) . ' menit yang lalu';
    } elseif ($selisih < 86400) {
        return floor($selisih / 3600) . ' jam yang lalu';
    } else {
        return floor($selisih / 86400) . ' hari yang lalu';
    }
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
                    <?= isset($_SESSION['user']) ? $_SESSION['user']['nama'] : 'Admin' ?>
                </div>
                <p class="text-sm text-slate-950 text-center -mt-1">
                    Terakhir masuk
                    <?= isset($_SESSION['login_time']) ? waktuSejak($_SESSION['login_time']) : 'baru saja' ?>
                </p>
                <div class="flex items-center gap-5 text-sm mb-10 cursor-default">
                    <span class="bg-sky-200 px-2 py-1 rounded-full truncate">
                        <span class="text-slate-950">ID : pengguna_<?= $_SESSION['user']['id_admin'] ?></span>
                    </span>
                    <button class="text-sm px-2 py-1 bg-sky-200 rounded-full">
                        <span class="text-slate-950">salin</span>
                    </button>
                </div>
                <div class="ml-5 w-full">
                    <form id="hapusAkunForm" action="<?= BASEURL ?>/Pengguna_controller/hapusAkun" method="POST">
                        <input type="hidden" name="id_admin" value="<?= $_SESSION['user']['id_admin'] ?>" />
                        <button
                            type="button"
                            class="delete-akun-btn text-red-600 text-sm flex items-center gap-1 justify-center mt-3 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                            Hapus Akun
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 flex flex-col gap-6">
            <div class="bg-white rounded-lg p-4 shadow-md">
                <h2 class="font-bold text-lg mb-7 text-slate-950">Informasi Pribadi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-slate-950">Nama Depan</label>
                        <input
                            type="text"
                            value="<?= $data['profil']['nama_depan'] ?>"
                            class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 cursor-default"
                            readonly />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1 text-slate-950">Nama Belakang</label>
                        <input
                            type="text"
                            value="<?= $data['profil']['nama_belakang'] ?>"
                            class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2 cursor-default"
                            readonly />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium mb-1 text-slate-950">Email</label>
                        <input
                            type="email"
                            value="<?= $data['profil']['email'] ?>"
                            class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2 cursor-default"
                            readonly />
                    </div>
                </div>
                <div class="mt-11">
                    <a
                        href="<?= BASEURL ?>/Pengguna_controller/editPengguna/<?= $_SESSION['user']['id_admin'] ?>"
                        class="w-full block text-center bg-sky-600 text-white py-2 rounded-lg hover:bg-sky-700 transition duration-300">
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
