<main class="flex-1 overflow-y-auto p-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-1 p-4 rounded-lg shadow border border-sky-800">
                        <div class="flex flex-col items-center gap-3">
                            <div class="h-25 w-25 bg-gradient-to-l from-sky-800 to-sky-300 rounded-full">
                                <img src="../asset/foto.png" alt="avatar" class="h-full w-full object-cover" />
                            </div>
                            <p class="text-xl font-bold text-center text-slate-950 -my-1">@windahbaturingan.com</p>
                            <p class="text-sm text-slate-950 text-center -mt-1">Terakhir masuk 5 menit yang lalu</p>
                            <div class="flex items-center gap-5 text-sm mb-10">
                                <span class="bg-sky-200 px-2 py-1 rounded-full truncate">
                                    <span class="text-slate-950">ID : pengguna_hj0krah14bajs6Tg...</span>
                                </span>
                                <button class="text-xs px-2 py-1 bg-sky-200 rounded-full">
                                    <span class="text-slate-950">salin</span>
                                </button>
                            </div>
                            <div class="my-5 ml-5 w-full">
                                <button class="text-blue-600 text-sm flex items-center gap-1 justify-center mb-4">
                                    <i class="fas fa-lock"></i>
                                    Ganti Sandi
                                </button>
                                <button class="text-red-600 text-sm flex items-center gap-1 justify-center">
                                    <i class="fas fa-trash"></i>
                                    Hapus Pengguna
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2 flex flex-col gap-6">
                        <div class="border rounded-lg p-4 border-sky-800">
                            <h2 class="font-bold text-lg mb-5 text-slate-950">Informasi Pribadi</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Nama Depan</label>
                                    <input type="text" value="Windah" class="w-full bg-sky-200 p-2 rounded-lg text-slate-950" readonly />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Nama Belakang</label>
                                    <input
                                        type="text"
                                        value="Batubata"
                                        class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2"
                                        readonly />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Email</label>
                                    <input
                                        type="text"
                                        value="windah_baturingan1Actg_54Tgyl.com"
                                        class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2"
                                        readonly />
                                </div>
                            </div>
                        </div>

                        <div class="bg-white border rounded-lg p-4 border-sky-800">
                            <h2 class="font-bold text-lg mb-5 text-slate-950">Media Sosial</h2>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Instagram</label>
                                    <input
                                        type="text"
                                        value="https://www.instagram.com/windahbatubata"
                                        class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2"
                                        readonly />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Facebook</label>
                                    <input
                                        type="text"
                                        value="https://www.facebook.com/windahbatubata"
                                        class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2"
                                        readonly />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1 text-slate-950">Twitter</label>
                                    <input
                                        type="text"
                                        value="https://www.twitter.com/windahbatubata"
                                        class="w-full bg-sky-200 p-2 rounded-lg text-slate-950 mb-2"
                                        readonly />
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-4 justify-between">
                            <button type="submit" class="w-1/2 bg-blue-600 text-white py-2 rounded-full hover:bg-blue-700 transition duration-300">
                                Batal
                            </button>
                            <button type="submit" class="w-1/2 bg-blue-600 text-white py-2 rounded-full hover:bg-blue-700 transition duration-300">
                                Edit
                            </button>   
                        </div>
                    </div>
                </div>
            </main>