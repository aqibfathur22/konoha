const dropdown = document.querySelector('#dropdown');
const dropdownShow = document.querySelector('#dropdown-show');
const iconDropdown = document.querySelector('#icon-dropdown');

document.querySelectorAll('a[href^="<?= BASEURL; ?>/Home_controller#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
        // Cek apakah kita berada di halaman Home
        if (window.location.pathname.includes('/Home_controller') || window.location.pathname === '/') {
            e.preventDefault(); // Mencegah pindah halaman secara instan

            const targetId = this.getAttribute('href').split('#')[1];
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                });
            }
        }
        // Jika tidak di halaman Home, biarkan link berjalan normal (pindah halaman)
    });
});

// nomor telepon hanya bisa diisi angka
function onlyNumeric(event) {
    var charCode = event.which ? event.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
}

(function () {
    const selectBtn = document.getElementById('kategori-selected');
    const optionsDiv = document.getElementById('kategori-options');
    const hiddenInput = document.getElementById('id_kategori');
    const selectedText = document.getElementById('kategori-selected-text');
    const optionItems = optionsDiv.querySelectorAll('div[data-value]');

    selectBtn.addEventListener('click', function (e) {
        optionsDiv.classList.toggle('hidden');
    });

    optionItems.forEach(function (item) {
        item.addEventListener('click', function () {
            hiddenInput.value = this.getAttribute('data-value');
            selectedText.textContent = this.textContent;
            selectedText.classList.remove('text-slate-400');
            optionsDiv.classList.add('hidden');
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!document.getElementById('custom-select-kategori').contains(e.target)) {
            optionsDiv.classList.add('hidden');
        }
    });
})();
