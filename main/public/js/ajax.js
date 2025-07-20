document.addEventListener('DOMContentLoaded', function () {
    const searchForm = document.getElementById('search-form');
    const tableContainer = document.getElementById('table-container');

    // Fungsi untuk menangani request AJAX
    const performSearch = (event) => {
        event.preventDefault();
        const formData = new FormData(searchForm);
        const searchUrl = searchForm.getAttribute('action');

        tableContainer.innerHTML = '<p class="text-center text-slate-500 py-10">Mencari...</p>';

        fetch(searchUrl, {
            method: 'POST',
            body: formData,
        })
            .then((response) => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then((html) => {
                tableContainer.innerHTML = html;
            })
            .catch((error) => {
                console.error('Error fetching search results:', error);
                tableContainer.innerHTML = '<p class="text-center text-red-500 py-10">Terjadi kesalahan saat memuat data.</p>';
            });
    };

    searchForm.addEventListener('submit', performSearch);
});
