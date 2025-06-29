//function untuk menyalin teks
function salinID() {
    const idText = document.getElementById("idPengguna").innerText;
    navigator.clipboard.writeText(idText)
        .then(function () {
            Swal.fire({
                icon: 'success',
                title: 'ID berhasil disalin!',
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true
            });
        })
        .catch(function (err) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal menyalin ID!',
                text: err,
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true
            });
        });
}

// functiun untuk tampilkan gambar secara realtime saat upload gambar
function previewGambar(event) {
    const input = event.target;
    const preview = document.getElementById('gambar-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }

    return true;
}

// function sweet alert delete berita
document.addEventListener('DOMContentLoaded', function (e) {
    document.querySelectorAll('.delete-btn-berita').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Berita akan terhapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#c10007',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});

// function sweet alert delete kategori
document.addEventListener('DOMContentLoaded', function (e) {
    document.querySelectorAll('.delete-btn-kategori').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Kategori akan terhapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0084d1',
                cancelButtonColor: '#c10007',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});

// function sweet alert delete kategori
document.addEventListener('DOMContentLoaded', function (e) {
    document.querySelectorAll('.delete-btn-beranda').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Aduan akan terhapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0084d1',
                cancelButtonColor: '#c10007',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const btnHapus = document.querySelector('.delete-akun-btn');
    const formHapus = document.getElementById('hapusAkunForm');

    if (btnHapus && formHapus) {
        btnHapus.addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Akun akan terhapus secara permanen',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0084d1',
                cancelButtonColor: '#c10007',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    formHapus.submit(); // <- Submit form jika dikonfirmasi
                }
            });
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.logout-btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            e.preventDefault();

            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Apakah Anda yakin ingin keluar?',
                text: 'Anda akan keluar dari sesi saat ini',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, keluar',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
});
