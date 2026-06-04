<html>
    <head>
        <meta charset="UTF-8">
        <title>DATA MAHASISWA</title>
        <link rel="stylesheet" href="asset/css/style.css">
    </head>
    <body>
        <div class="nav-main">
            <a href="index.php">🏠 Home</a>
            <a href="profile.php">📖 Profile</a>
            <a href="contact.php">📞 Contact</a>
            <a href="mahasiswa.php">👨‍🎓 Data Mahasiswa</a>
        </div>

        <div class="container">
            <h1 class="text-center">DATA MAHASISWA</h1>

            <h2 class="text-center">Data Mahasiswa</h2>

            <div class="text-center" style="margin-bottom: 20px;">
                <a href="tambahdata.php" class="btn btn-success">＋ Tambah Data</a>
            </div>

            <table class="data-table" id="tabelMahasiswa">
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Foto</th>
                    <th colspan="3">Nilai</th>
                    <th rowspan="2">Aksi</th>
                </tr>
            <tr>
                <th>UTS</th>
                <th>UAS</th>
                <th>Tugas</th>
            </tr>

            <!-- Data statis -->
            <tr align="center">
                <td>1</td>
                <td>Ahmad Kempong</td>
                <td><img src="asset/image/KPU_Icuk_Sugiarto.jpg" alt="Foto" width="100"></td>
                <td>80</td>
                <td>85</td>
                <td>90</td>
                <td>-</td>
            </tr>
            <tr align="center">
                <td>2</td>
                <td>Ahmad Badawi</td>
                <td><img src="asset/image/ahmad badawi.jpg" alt="Foto" width="100"></td>
                <td>85</td>
                <td>87</td>
                <td>90</td>
                <td>-</td>
            </tr>
            <tr align="center">
                <td>3</td>
                <td>Ahmad Badru</td>
                <td><img src="asset/image/ahmad badru.jpeg" alt="Foto" width="100"></td>
                <td>87</td>
                <td>87</td>
                <td>92</td>
                <td>-</td>
            </tr>
        </table>

        <script>
            function loadData() {
                // Hapus baris dinamis lama dulu
                var tabel = document.getElementById('tabelMahasiswa');
                var barisDinamis = tabel.querySelectorAll('.baris-dinamis');
                barisDinamis.forEach(function(baris) {
                    baris.remove();
                });

                // Load ulang dari localStorage
                var dataMahasiswa = JSON.parse(localStorage.getItem('dataMahasiswa')) || [];
                var nomorAwal = 4;

                dataMahasiswa.forEach(function(mhs, index) {
                    var baris = tabel.insertRow(-1);
                    baris.align = 'center';
                    baris.className = 'baris-dinamis';
                    baris.innerHTML =
                        '<td>' + (nomorAwal + index) + '</td>' +
                        '<td>' + mhs.nama + '</td>' +
                        '<td>-</td>' +
                        '<td>' + mhs.uts + '</td>' +
                        '<td>' + mhs.uas + '</td>' +
                        '<td>' + mhs.tugas + '</td>' +
                        '<td><button class="btn btn-danger" onclick="hapusData(' + index + ')">🗑 Hapus</button></td>';
                });
            }

            function hapusData(index) {
                if (confirm('Yakin ingin menghapus data ini?')) {
                    var dataMahasiswa = JSON.parse(localStorage.getItem('dataMahasiswa')) || [];
                    dataMahasiswa.splice(index, 1);
                    localStorage.setItem('dataMahasiswa', JSON.stringify(dataMahasiswa));
                    loadData(); // refresh tabel
                }
            }

            // Panggil saat halaman dibuka
            loadData();
        </script>

            <table class="data-table" style="margin-top: 30px;">
                <tr>
                    <td>1,1</td><td>1,2</td><td>1,3</td><td>1,4</td>
                </tr>
                <tr>
                    <td>2,1</td><td colspan="2" rowspan="2">?</td><td>2,4</td>
                </tr>
                <tr>
                    <td>3,1</td><td>3,4</td>
                </tr>
                <tr>
                    <td>4,1</td><td>4,2</td><td>4,3</td><td>4,4</td>
                </tr>
            </table>
        </div>

    </body>
</html>
