// logika menu hamburger
const hamburger = document.querySelector('#hamburger');
const nav = document.querySelector('#nav-menu');
const header = document.querySelector('header');

// muncul background navbar putih ketika di scroll
window.onscroll = function () {
    const header = document.querySelector('header');
    const navFix = header.offsetTop;

    if (window.pageYOffset > navFix) {
        header.classList.add('nav-fix');
        header.style.transition = 'background-color 0.5s ease-in-out';
    } else {
        header.classList.remove('nav-fix');
        header.style.transition = 'background-color 0.5s ease-in-out';
    }
};

// memunculkan menu hamburger
if (hamburger) {
    hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        if (nav.classList.contains('hidden')) {
            nav.classList.remove('hidden');
            nav.style.transform = 'translateX(100%)';
            nav.style.transition = 'transform 0.7s ease-in-out';
            setTimeout(() => {
                nav.style.transform = 'translateX(0%)';
            }, 50);
        } else {
            nav.style.transform = 'translateX(100%)';
            nav.style.transition = 'transform 0.7s ease-in-out';
            setTimeout(() => {
                nav.classList.add('hidden');
            }, 700);
        }
    });
}

// ketika klik diluar hamburger dan navbar maka hamburger tertutup
document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !header.contains(e.target)) {
        nav.style.transform = 'translateX(100%)';
        nav.style.transition = 'transform 0.7s ease-in-out';
        hamburger.classList.remove('hamburger-active');
        setTimeout(() => {
            nav.classList.add('hidden');
        }, 700);
    }
});
