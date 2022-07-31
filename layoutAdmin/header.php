<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../img/iKPOP.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>iKPOP</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #202020;">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                <img src="../img/iKPOP.png" alt="" width="35" height="35" class="me-2"><span class="fw-bold">iKPOP</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <form class="d-flex m-auto" action="search.php" method="POST">
                    <input class="form-control me-2" type="search" id="search" name="search" placeholder="Search" required autocomplete="off">
                    <button class="btn btn-danger" type="submit" name="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <div class="navbar-nav">
                    <a class="nav-link" href="home.php">Home</a>
                    <a class="nav-link" href="signOut.php">Sign Out</a>
                </div>
            </div>
        </div>
    </nav>