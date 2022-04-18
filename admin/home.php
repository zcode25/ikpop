<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require '../functions.php';

$groups = query("SELECT * FROM groups ORDER BY groups_name");

if (isset($_POST["add"])) {

    if (addGroups($_POST) > 0) {
        echo "

      <script>
        window.location.href = window.location.href;
      </script>

    ";
    } else {

        echo "

      <script>
        alert('Add group failed');
      </script>

    ";
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <div class="navbar-nav m-auto">
                    <a class="nav-link" href="home.php">Home</a>
                    <a class="nav-link" href="signOut.php">Sign Out</a>
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

    <section class="groups mt-4 mb-5" id="groups">
        <div class="container">
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h3>Groups</h3>
                </div>
                <div class="col align-self-center text-end">
                    <button class="btn btn-danger" type="button" onclick="myFunction()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form id="groups_form" style="display: none;" action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="groups_name" id="groups_name" name="groups_name" required autocomplete="off">
                            <label for="groups_name">Group Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="groups_link" id="groups_link" name="groups_link" required autocomplete="off">
                            <label for="groups_link">Group Link</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="groups_des" id="groups_des" name="groups_des" style="height: 150px" required></textarea>
                            <label for="groups_des">Group Description</label>
                        </div>
                        <div class="text-end mb-3">
                            <button type="reset" class="btn btn-secondary" onclick="myFunction()">Cancel</button>
                            <button type="submit" class="btn btn-danger" name="add">Add</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php foreach ($groups as $group) : ?>
                    <div class="col-md-6 col-xl-3">
                        <div class="card mb-3" style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $group['groups_id']; ?>';">
                            <div class="row g-0">
                                <div class="col-10 align-self-center">
                                    <div class="card-body">
                                        <h6 class="card-text fw-bold"><?= $group['groups_name']; ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="footer mt-5 pt-4 pb-4" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="text-secondary">Production</span>
                    <h3 class="mt-2 fw-bold">ZCODE</h3>
                    <p class="mt-3">© 2022 iKPOP. All rights reserved.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        function myFunction() {
            var x = document.getElementById("groups_form");

            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>