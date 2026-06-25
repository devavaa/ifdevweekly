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

?>