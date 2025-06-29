<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?= $data['title']  ?></title>
        <link rel="stylesheet" href="<?= BASEURL; ?>/src/output.css" />

    </head>
    <body class="bg-slate-100 text-slate-50">
        <div class="flex">
            <aside class="bg-sky-800 w-64 p-4 fixed top-0 left-0 h-screen z-10 flex flex-col justify-between">
                <div>
                    <h1 class="text-xl font-semibold my-2 text-center">Admin Konoha</h1>
                    <hr class="my-4 border-t-3" />
                    <nav class="mt-4">
                        <a href="<?= BASEURL; ?>/Beranda_controller" class="<?= $data['berandaNav'] ?>">
                            <div class="w-5 h-5">
                                <i class="fa-solid fa-home"></i>
                            </div>
                            Beranda
                        </a>
                        <a href="<?= BASEURL; ?>/Pengguna_controller" class="<?= $data['penggunaNav'] ?>">
                            <div class="w-5 h-5">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            Pengguna
                        </a>
                        <a href="<?= BASEURL; ?>/Berita_controller" class="<?= $data['beritaNav'] ?>">
                            <div class="w-5 h-5">
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            Berita
                        </a>
                        <a href="<?= BASEURL; ?>/Profil_controller" class="<?= $data['profilNav'] ?>">
                            <div class="w-5 h-5">
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            Profil Desa
                        </a>
                        <a href="<?= BASEURL; ?>/Kategori_controller" class="<?= $data['kategoriNav'] ?>">
                            <div class="w-5 h-5">
                                <i class="fa-solid fa-paper-plane"></i>
                            </div>
                            Kategori
                        </a>
                    </nav>
                </div>
                <div class="mb-2">
                    <a href="<?= BASEURL; ?>/Logout_controller" class="logout-btn flex items-center gap-2 p-2 mt-2 group hover:bg-white/50 hover:text-slate-800 rounded-lg transition">
                        <div class="w-5 h-5">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>
                        Keluar
                    </a> 
                </div>
            </aside>

            <div class="flex-1 ml-64 h-screen overflow-hidden flex flex-col">
                <div class="bg-slate-100 p-4 sticky top-0 z-10">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-2 md:justify-end">
                        <div class="flex items-center gap-4">
                            <div>
                                <i class="fas fa-bell text-xl" style="color: black"></i>
                            </div>
                            <a href="<?= BASEURL ?>/Pengguna_controller">
                                <div class="bg-sky-200 pl-3 py-1 rounded-full text-sm font-semibold">
                                    <div class="flex items-center flex-row-reverse gap-2">
                                        <i class="fa-solid fa-circle-user text-3xl text-slate-700 mr-2"></i>
                                        <span class="text-slate-950 ml-2">
                                            <?= isset($_SESSION['user']) ? $_SESSION['user']['nama'] : 'Admin' ?>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="my-4 border-t-4 text-sky-800" />
                </div>

