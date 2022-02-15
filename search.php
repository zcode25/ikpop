<?php

require 'functions.php';
if (isset($_POST["submit"])) {

    $keyword = $_POST['search'];
    $groups = query("SELECT * FROM groups WHERE groups_name LIKE '%$keyword%'");

    $groups2 = get_groups($groups);
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/iKPOP.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>iKPOP</title>
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #202020;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/iKPOP.png" alt="" width="35" height="35" class="me-2"><span class="fw-bold">iKPOP</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto">
                    <a class="nav-link" href="index.php">Home</a>
                    <a class="nav-link" href="https://www.instagram.com/zcode25/" target="_blank">Follow Us</a>
                    <a class="nav-link" href="https://saweria.co/azein25" target="_blank">Donate</a>
                </div>
                <form class="d-flex" action="search.php" method="POST">
                    <input class="form-control me-2" type="search" id="search" name="search" placeholder="Search" required autocomplete="off">
                    <button class="btn btn-danger" type="submit" name="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>

            </div>
        </div>
    </nav>

    <section class="groups mt-3 mb-5" id="groups">
        <div class="container">
            <div class="row">
                <h3 class="mb-3">Groups</h3>
                <?php if (count($groups2) >= 1) : ?>
                    <?php foreach ($groups2 as $group) : ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3" style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $group['groups_id']; ?>';">
                                <div class="row g-0">
                                    <div class="col-2 align-self-center">
                                        <img src="<?= $group['groups_img']; ?>" class="img-fluid rounded" alt="...">
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <div class="card-body">
                                            <h6 class="card-title fw-bold"><?= $group['groups_name']; ?></h6>
                                            <p class="card-text text-secondary fw-normal" style="font-size: 14px;"><?= number_format($group['subscriber'], 0, ".", "."); ?> Subscriber</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <h5 class="text-secondary">Not Found</h5>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>