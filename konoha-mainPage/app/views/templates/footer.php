        
        <!-- javascrip sources -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://kit.fontawesome.com/9b8f32c598.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

        <script>
            const CONFIG = {
                baseUrl: "<?= BASEURL; ?>",
                controller: "/Home_controller" 
            };
        </script>
        <script src="<?= BASEURL; ?>/js/hamburger.js"></script>
        <script src="<?= BASEURL; ?>/js/landingPage.js"></script>
        <script src="<?= BASEURL; ?>/js/slider.js"></script>
        <script src="<?= BASEURL; ?>/js/wow.min.js"></script>


        <script>
            new WOW().init();
        </script>
    </body>
</html>