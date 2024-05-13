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


$(document).ready(function() {
        $('.btn-edit').click(function() {
            var id = $(this).data('id');
            $.get('/surat/' + id + '/edit', function(data) {
                // Isi form dengan data yang diambil dari server
                $('#jenis_surat').val(data.jenis_surat);
                $('#nomor_surat').val(data.nomor_surat);
                // ...isi kolom lainnya...

                // Tampilkan modal atau form untuk mengedit data
                $('#editModal').modal('show');
            });
        });
});

$(document).ready(function() {
    $('#editForm').submit(function(event) {
        event.preventDefault();

        var id = $(this).data('id');
        var formData = $(this).serialize();

        $.ajax({
            url: '/surat/' + id,
            method: 'PUT',
            data: formData,
            success: function(response) {
                $('#editModal').modal('hide');
                // Tampilkan pesan sukses atau lakukan aksi lain yang diinginkan
            }
        });
    });
});

$(document).ready(function() {
    $('.select2').select2({
        tags: true,
        minimumInputLength: 0
    });
});
