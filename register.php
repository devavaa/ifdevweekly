<?php

session_start();

if(isset($_SESSION["login"]))
{
    header("Location: mahasiswa.php");
    exit;
}

require "fungsi.php";;

if(isset($_POST["register"]))
{
    if(register($_POST) > 0)
    {
        echo "
        <script>
            alert('Register berhasil!');
            document.location.href='login.php';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
            alert('Register gagal!');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

<div class="container">

    <div class="form-container">

        <h2>Register User</h2>

        <form action="" method="POST">

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="konfirmasi" required>
            </div>

            <div class="btn-group">

                <button
                    type="submit"
                    name="register"
                    class="btn btn-success">
                    Register
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>