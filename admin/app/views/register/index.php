<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Daftar Admin</title>
        <link rel="stylesheet" href="<?=BASEURL?>/src/output.css" />
    </head>
    <body class="bg-gradient-to-l from-sky-700 via-slate-400 to-white flex items-center justify-center min-h-screen">
        <div class="bg-white/50 p-8 rounded-lg shadow-lg w-full max-w-md backdrop-blur-xl">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Daftar Admin</h2>

            <?php if (!empty($data['error'])) : ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                    <?= $data['error'] ?>
                </div>
            <?php endif; ?>

            <form action="<?=BASEURL?>/Register" method="POST" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Pengguna</label>
                    <input
                        type="text"
                        name="nama"
                        required
                        class="w-full px-4 py-2 border border-sky-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-2 border border-sky-500 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div class="mt-10">
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-full hover:bg-blue-700 transition duration-300">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const inputNama = document.querySelector('input[name="nama"]');
                if (inputNama) {
                    inputNama.addEventListener('keydown', function (e) {
                        if (e.key === ' ') {
                            e.preventDefault();
                        }
                    });
                }
            });
        </script>
    </body>
</html>
