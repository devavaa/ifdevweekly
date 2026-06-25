<?php

    require "fungsi.php";

    $qmahasiswa = "SELECT * FROM mahasiswa";

    $mahasiswas = tampildata($qmahasiswa);

?>

<!DOCTYPE html>
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
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>

            <?php
            $no = 1;

            foreach($mahasiswas as $data)
            {
            ?>

            <tr align="center">
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nim']; ?></td>
                <td><?php echo $data['prodi']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo $data['no_hp']; ?></td>

                <td>

                <?php
                if(!empty($data['foto']))
                {
                ?>

                <img
                src="asset/image/<?php echo $data['foto']; ?>"
                width="80">

                <?php
                }
                else
                {
                ?>

                👨‍🎓

                <?php
                }
                ?>

                </td>

              <td>
                 <a href="ubahdata.php?id=<?php echo $data['id']; ?>">Ubah</a> |
                 <a href="hapus.php?id=<?php echo $data['id']; ?>"
                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                 </a>
              </td>
            </tr>

            <?php   
            }
            ?>

        </table>

        <table class="data-table" style="margin-top: 30px;">
            <tr>
                <td>1,1</td>
                <td>1,2</td>
                <td>1,3</td>
                <td>1,4</td>
            </tr>

            <tr>
                <td>2,1</td>
                <td colspan="2" rowspan="2">?</td>
                <td>2,4</td>
            </tr>

            <tr>
                <td>3,1</td>
                <td>3,4</td>
            </tr>

            <tr>
                <td>4,1</td>
                <td>4,2</td>
                <td>4,3</td>
                <td>4,4</td>
            </tr>
        </table>

    </div>

</body>
</html>