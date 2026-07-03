<?php


session_start();

if(!isset($_SESSION["login"]))
{
    header("Location: login.php");
    exit;
}


require 'fungsi.php';

if(isset($_POST["kirim"]))
{
    if(tambahdata($_POST) > 0)
    {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href='mahasiswa.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Data gagal ditambahkan!');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
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

    <div class="form-container">

        <h2>Tambah Data Mahasiswa</h2>

        <form action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="prodi" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" required>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" accept="image/*">
            </div>

            <div class="btn-group">

                <button type="submit" name="kirim" class="btn btn-primary">
                    💾 Simpan
                </button>

                <a href="mahasiswa.php" class="btn btn-danger">
                    ✕ Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>