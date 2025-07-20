const swiper = new Swiper('.swiper', {
    loop: true,
    spaceBetween: 50,
    slidesPerView: 1,
    autoplay: {
        delay: 3000,
        pauseOnMouseEnter: true,
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
    },
    navigation: {
        nextEl: '.next',
        prevEl: '.prev',
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 2,
        },
        1200: {
            slidesPerView: 3,
        },
    },
});
