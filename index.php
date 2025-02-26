<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "formmhs";

    $db = mysqli_connect($host, $user, $password, $db_name);
    if($db->connect_error) {
        die("Gagal");
    }

    if(isset($_POST['Submit'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];

        try {
            $sql = "INSERT INTO mhs (NIM, Nama) VALUES ('$nim', '$nama')";
            if($db->query($sql)) {
                $register_message = "Daftar akun berhasil, silahkan daftar login";
            }else {
                $register_message = "Daftar akun gagal, silahkan ulangi kembali";
            }
        }catch(mysqli_sql_exception $e) {
            $register_message = "Username sudah digunakan, silahkan ganti yang lain";
            
        }
        $db->close();

    }


?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h3 class="text-center mb-4">Form</h3>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
            </div>
            <button type="submit" class="btn btn-primary" name="Submit">Submit</button>
        </form>
    </div>
</body>
</html>
