<?php
session_start();
include '../config/app.php';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $query = "SELECT * FROM tb_user WHERE username = '$username'";  // Query untuk mengambil data user berdasarkan username
    $result = mysqli_query($connect, $query);   // Eksekusi query

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['role'] = $row['role'];
            header('Location: ../index.php');
            exit;
        } else {     
            $error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD PHP</a>
        </div>
    </nav>

    <div class="container mt-5">
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= "Username/password salah." ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="loginName" name="username" class="form-control" />
                <label class="form-label" for="loginName">Email or username</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="loginPassword" name="password" class="form-control" />
                <label class="form-label" for="loginPassword">Password</label>
            </div>

            <!-- Submit button -->
            <button type="submit" name="login" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>