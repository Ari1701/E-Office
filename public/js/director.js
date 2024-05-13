document.addEventListener('DOMContentLoaded', function () {
    var tanggalSuratInput = document.getElementById('tanggal_surat');
    var tanggalDiterimaInput = document.getElementById('tanggal_diterima');
    
    // Fungsi untuk mengubah tipe input dari text ke date saat input diberi fokus
    function changeInputType(input) {
        input.type = 'date';
        // Mencegah kehilangan nilai input saat mengubah tipe
        input.focus();
    }
    
    // Menambahkan event listener untuk setiap input tanggal
    tanggalSuratInput.addEventListener('focus', function () {
        changeInputType(tanggalSuratInput);
    });
    
    tanggalDiterimaInput.addEventListener('focus', function () {
        changeInputType(tanggalDiterimaInput);
    });
});

function searchSurat() {
    // Ambil nilai input pencarian
    var searchValue = document.getElementById("searchInput").value.toLowerCase();
    
    // Ambil semua baris (tr) dalam tabel
    var rows = document.querySelectorAll("#suratTable tbody tr");
    
    // Loop melalui setiap baris tabel
    rows.forEach(function(row) {
        // Ambil sel (td) di dalam setiap baris
        var cells = row.querySelectorAll("td");
        var found = false;
        // Loop melalui setiap sel dalam baris
        cells.forEach(function(cell) {
            // Periksa apakah nilai sel mengandung nilai pencarian
            if (cell.textContent.toLowerCase().indexOf(searchValue) > -1) {
                // Jika ditemukan, tandai sebagai ditemukan dan hentikan pencarian selanjutnya
                found = true;
                return;
            }
        });
        // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
        if (found) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}

// Menambahkan event listener untuk tombol pencarian
document.getElementById("searchButton").addEventListener("click", searchSurat);

// Tambahan: Handle pencarian ketika tombol enter ditekan dalam input
document.getElementById("searchInput").addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        searchSurat();
    }
});




