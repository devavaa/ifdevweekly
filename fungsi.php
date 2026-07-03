<?php

$koneksi = mysqli_connect("localhost", "root", "root", "ifdevweekly");

function tampildata($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    $rows = [];

    while($row = mysqli_fetch_assoc($result))
    {
        $rows[] = $row;
    }

    return $rows;
}

function tambahdata($data)
{
    global $koneksi;

    $nama  = $data["nama"];
    $nim   = $data["nim"];
    $prodi = $data["prodi"];
    $email = $data["email"];
    $no_hp = $data["no_hp"];

    $namaFoto = "";

    if(isset($_FILES['foto']) && $_FILES['foto']['error'] == 0)
    {
        $namaFoto = $_FILES['foto']['name'];
        $tmpFoto  = $_FILES['foto']['tmp_name'];

        move_uploaded_file(
            $tmpFoto,
            "asset/image/" . $namaFoto
        );
    }

    $query = "INSERT INTO mahasiswa
              (nama, nim, prodi, email, no_hp, foto)
              VALUES
              ('$nama', '$nim', '$prodi', '$email', '$no_hp', '$namaFoto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function register($data)
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $username = strtolower(stripslashes($data["username"]));

    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $konfirmasi = mysqli_real_escape_string($koneksi, $data["konfirmasi"]);

    // Cek username
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

    if(mysqli_fetch_assoc($cek))
    {
        echo "<script>alert('Username sudah digunakan');</script>";
        return false;
    }

    // Cek konfirmasi password
    if($password != $konfirmasi)
    {
        echo "<script>alert('Konfirmasi password salah');</script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke database
    mysqli_query($koneksi,"
        INSERT INTO user
        (nama, username, password)
        VALUES
        ('$nama', '$username', '$password')
    ");

    return mysqli_affected_rows($koneksi);
}

?>