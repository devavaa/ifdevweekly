<?php

require "fungsi.php";

$id = $_GET['id'];

$data = tampildata("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST['ubah']))
{
    global $koneksi;

    $nama  = $_POST['nama'];
    $nim   = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    $query = "UPDATE mahasiswa SET
                nama='$nama',
                nim='$nim',
                prodi='$prodi',
                email='$email',
                no_hp='$no_hp'
              WHERE id=$id";

    mysqli_query($koneksi, $query);

    echo "
    <script>
        alert('Data berhasil diubah!');
        document.location.href='mahasiswa.php';
    </script>
    ";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ubah Data Mahasiswa</title>
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
            <h2>Ubah Data Mahasiswa</h2>

            <form action="" method="post">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama"
                           value="<?php echo $data['nama']; ?>" required>
                </div>

                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim"
                           value="<?php echo $data['nim']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <input type="text" name="prodi"
                           value="<?php echo $data['prodi']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                           value="<?php echo $data['email']; ?>" required>
                </div>

                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp"
                           value="<?php echo $data['no_hp']; ?>" required>
                </div>

                <div class="btn-group">
                    <button type="submit" name="ubah" class="btn btn-primary">
                        💾 Simpan Perubahan
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