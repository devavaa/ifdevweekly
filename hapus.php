<?php

session_start();

if(!isset($_SESSION["login"]))
{
    header("Location: login.php");
    exit;
}

?>

require 'fungsi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");

header("Location: mahasiswa.php");

?>