<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <link href="./src/output.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    </head>
    <body>
        <div class="container mx-auto pt-20 lg:pt-32 2xl:pt-56 px-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
            <div class="flex flex-col lg:flex-row justify-center items-center lg:gap-20">
                <div class="flex flex-col justify-center gap-10 lg:gap-36">
                    <div class="w-full scale-90 lg:scale-60 lg:hidden">
                        <img src="src/assets/404.png" />
                    </div>
                    <div>
                        <h1 class="text-xl xl:text-4xl text-center lg:text-left font-semibold text-slate-700">
                            Halaman yang anda tuju
                            <br />
                            tidak dapat ditemukan!
                        </h1>
                    </div>
                    <div class="text-center lg:text-left">
                        <a href="<?= BASEURL; ?>/home">
                            <button
                                class="bg-sky-500 text-white text-sm lg:text-base px-6 lg:px-12 py-2 lg:py-3 rounded-xl hover:bg-sky-600 transition-all duration-500 ease-in-out cursor-pointer">
                                Kembali ke beranda
                            </button>
                        </a>
                    </div>
                </div>
                <div class="w-[40%] hidden lg:block">
                    <img src="<?=BASEURL?>/src/assets/404.png" />
                </div>
            </div>
        </div>

        <footer class="absolute bottom-0 w-full">
            <div class="mb-8">
                <h4 class="text-slate-700 text-xs lg:text-base text-center font-light">copyright 2025 Pemerintah Desa Konoha</h4>
            </div>
        </footer>
    </body>
</html>
