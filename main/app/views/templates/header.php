<!DOCTYPE html>
<html class="scroll-smooth">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?= $data['title']; ?></title>

        <!-- css sources -->
        <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <link href="<?= BASEURL; ?>/src/output.css" rel="stylesheet" />
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="../assets/img/konoha.png">

        <style>
            .alert {
                padding: 1rem;
                margin-bottom: 1rem;
                border: 1px solid transparent;
                border-radius: 0.375rem;
            }
            .alert-success {
                color: #065f46;
                background-color: #d1fae5;
                border-color: #a7f3d0;
            }
            .alert-error {
                color: #991b1b;
                background-color: #fee2e2;
                border-color: #fecaca;
            }
        </style>

    </head>

    <body class="fade-in">
        <!-- HEADER START -->
        <header
            class="fixed h-20 lg:h-22 z-50 py-5 w-full text-sky-500 bg-white backdrop-blur-sm duration-700 ease-in-out animate__animated animate__fadeInDown animate__slow">
            <!-- header container -->
            <div class="container mx-auto px-2 max-w-sm md:max-w-xl lg:max-w-4xl xl:max-w-6xl">
                <!-- header flexbox -->
                <div class="flex justify-between items-center relative">
                    <!-- header logo -->
                    <div class="my-auto">
                        <a href="<?= BASEURL; ?>/Home#beranda" class="text-2xl lg:text-3xl font-semibold js-smooth-scroll">Konoha.</a>
                    </div>
                    <!-- hamburger menu -->
                    <div class="flex items-center lg:w-72">
                        <button id="hamburger" name="hamburger" type="button" class="block lg:hidden">
                            <span class="hamburger-menu origin-top-left transition-all ease-in-out duration-500"></span>
                            <span class="hamburger-menu transition-all ease-in-out duration-300"></span>
                            <span class="hamburger-menu origin-bottom-left transition-all ease-in-out duration-500"></span>
                        </button>
                    </div>
                    <!-- navigation menu hamburger -->
                    <nav id="nav-menu" class="hidden lg:hidden absolute bg-white/90 bg-cover shadow-2xl w-70 top-16 p-10 rounded-2xl -right-[8%]">
                        <ul class="flex flex-col gap-8 font-medium text-lg">
                        <li class="group">
                                <a href="<?= BASEURL; ?>/Home#pengaduan" class="nav-bar-style js-smooth-scroll">Pengaduan</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Home#berita" class="nav-bar-style js-smooth-scroll">Berita</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Home#profil" class="nav-bar-style js-smooth-scroll">Profil</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Statistik" class="nav-bar-style">Statistik</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- navigation menu bar -->
                    <nav class="hidden lg:block lg:static lg:py-2">
                        <ul class="flex flex-row gap-10 font-medium text-lg ">
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Home#pengaduan" class="nav-bar-style js-smooth-scroll">Pengaduan</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Home#berita" class="nav-bar-style js-smooth-scroll">Berita</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Home#profil" class="nav-bar-style js-smooth-scroll">Profil</a>
                            </li>
                            <li class="group">
                                <a href="<?= BASEURL; ?>/Statistik" class="nav-bar-style">Statistik</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
<!-- HEADER END -->
        