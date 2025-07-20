        
        <!-- javascrip sources -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/9b8f32c598.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
            const CONFIG = {
                baseUrl: "<?= BASEURL; ?>",
                controller: "/Home" 
            };
        </script>
        <script src="<?= BASEURL; ?>/js/ajax.js"></script>
        <script src="<?= BASEURL; ?>/js/hamburger.js"></script>
        <script src="<?= BASEURL; ?>/js/script.js"></script>
        <script src="<?= BASEURL; ?>/js/slider.js"></script>
        <script src="<?= BASEURL; ?>/js/wow.min.js"></script>
        
        <script>
            new WOW().init();
        </script>

        <?php Flasher::flash(); ?>

    </body>
</html>