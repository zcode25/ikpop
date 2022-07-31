<?php

session_start();
if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}

require '../functions.php';

if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = sha1($_POST["password"]);

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if ($password == $row["admin_password"]) {

            $_SESSION["admin_email"] = $row["admin_email"];
            $_SESSION["login"] = true;


            echo "

            <script>
                document.location.href = 'home.php';
            </script>

            ";
            exit;
        }
    }

    $error = true;
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/iKPOP.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

    <title>iKPOP</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #202020;">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="../img/iKPOP.png" alt="" width="35" height="35" class="me-2"><span class="fw-bold">iKPOP</span>
            </a>
        </div>
    </nav>

    <section class="login mt-5 mb-5" id="login">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-6">
                    <div class="card deskripsi">
                        <div class="card-body">
                            <h3 class="card-title">Login</h3>
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                    Email dan Password yang anda masukan <strong>salah.</strong>
                                    <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <form class="mt-3" action="" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" autofocus required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-danger" type="submit" name="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>

</html>