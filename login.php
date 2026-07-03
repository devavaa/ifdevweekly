<?php

session_start();

if(isset($_SESSION["login"]))
{
    header("Location: mahasiswa.php");
    exit;
}

require "fungsi.php";

if(isset($_POST["login"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query(
        $koneksi,
        "SELECT * FROM user WHERE username='$username'"
    );

    if(mysqli_num_rows($result) === 1)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"]))
        {
            $_SESSION["login"] = true;

            header("Location: mahasiswa.php");
            exit;
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>

<div class="container">

    <div class="form-container">

        <h2>Login</h2>

        <?php if(isset($error)) : ?>
            <p style="color:red;">
                Username atau Password salah!
            </p>
        <?php endif; ?>

        <form action="" method="POST">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="btn-group">

                <button
                    type="submit"
                    name="login"
                    class="btn btn-primary">
                    Login
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>