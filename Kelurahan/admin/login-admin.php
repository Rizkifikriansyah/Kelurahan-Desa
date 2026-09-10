<?php
session_start();
include 'db.php';

// Cek tombol login
if (isset($_POST['submit'])) {

    // Ambil data dari form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    // Query cek login
    $query = "SELECT * FROM admin 
              WHERE email='$email' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    // Jika login berhasil
    if (mysqli_num_rows($result) > 0) {

        $data = mysqli_fetch_assoc($result);

        $_SESSION['admin'] = $data['email'];
        $_SESSION['nama'] = $data['nama'];

        echo "
        <script>
            alert('Login Berhasil!');
            window.location='index-admin.php';
        </script>
        ";
    } else {

        echo "
        <script>
            alert('Email atau Password Salah!');
            window.location='login-admin.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Kelurahan</title>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("../img/kel.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .login-box {
            width: 380px;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }

        .input-group input:focus {
            border-color: #007bff;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #0056b3;
        }

        .back {
            text-align: center;
            margin-top: 15px;
        }

        .back a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
        }

        .back a:hover {
            text-decoration: underline;
        }

        @media(max-width:768px) {

            .login-box {
                width: 90%;
                padding: 30px;
            }

        }
    </style>

</head>

<body>

    <div class="login-box">

        <h2>Login Admin</h2>

        <form method="POST">

            <div class="input-group">
                <label>Email Admin</label>
                <input type="email"
                    name="email"
                    placeholder="Masukkan Email"
                    required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password"
                    name="password"
                    placeholder="Masukkan Password"
                    required>
            </div>

            <button type="submit"
                name="submit"
                class="btn-login">
                Login
            </button>

        </form>

        <div class="back">
            <a href="../user/index.php">← Kembali ke Website</a>
        </div>

    </div>

</body>

</html>