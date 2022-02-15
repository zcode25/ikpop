<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require '../functions.php';
$group_id = $_GET['group_id'];
$groups = query("SELECT * FROM groups WHERE groups_id = '$group_id'")[0];
$musics2 = query("SELECT * FROM musics WHERE groups_id = '$group_id' AND musics_name = 'Random'");

$groups2 = get_group($groups);

$musics3 = [];
if (count($musics2) >= 1) {
    $random = query("SELECT * FROM musics WHERE groups_id = '$group_id' AND musics_name = 'Random'")[0];
    $musics3 = get_musics($random);
}

if (isset($_POST["edit"])) {

    if (editGroups($_POST) > 0) {
        echo "

      <script>
        window.location.href = window.location.href;
      </script>

    ";
    } else {

        echo "

      <script>
        alert('Edit group failed');
      </script>

    ";
    }
}

if (isset($_POST["delete"])) {

    if (deleteGroups($_POST) > 0) {
        echo "

      <script>
        document.location.href = 'home.php';
      </script>

    ";
    } else {

        echo "

      <script>
        alert('Delete group failed');
      </script>

    ";
    }
}

if (isset($_POST["random"])) {

    if (random($_POST) > 0) {
        echo "

      <script>
        window.location.href = window.location.href;
      </script>

    ";
    } else {

        echo "

      <script>
        alert('Edit random failed');
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

    <section class="list mt-4" id="list">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="https://www.youtube.com/embed/?list=<?= $random['musics_link']; ?>&index=<?php print rand(1, count($musics3)) ?>&controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video"></iframe>
                    </div>
                </div>
                <div class="col-xl-4" id="info">
                    <div class="card mb-3" style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $groups['groups_id']; ?>';">
                        <div class="row g-0">
                            <div class="col-md-2 col-xl-4 col-4 align-self-center">
                                <img src="<?= $groups2['groups_img']; ?>" class="img-fluid rounded" alt="...">
                            </div>
                            <div class="col-md-10 col-xl-8 col-8 align-self-center">
                                <div class="card-body">
                                    <h6 class="card-title fw-bold"><?= $groups2['groups_name']; ?></h6>
                                    <p class="card-text text-secondary fw-normal" style="font-size: 14px;"><?= number_format($groups2['subscriber'], 0, ".", "."); ?> Subscriber</p>
                                    <div class="g-ytsubscribe" data-channelid="<?= $groups2['groups_link']; ?>" data-layout="default" data-count="hidden"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <p class="card-text justify"><?= $groups['groups_des']; ?></p>
                                    <div class="text-end">
                                        <form action="" method="POST">
                                            <input type="hidden" class="form-control" id="groups_id" name="groups_id" value="<?= $groups['groups_id']; ?>">
                                            <button class="btn btn-danger" type="button" onclick="myFunction()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </button>
                                            <button class="btn btn-danger" type="submit" name="delete" onclick=" return confirm ('Apakah anda yakin?');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-12 groups">
                                <div class="card-body">
                                    <form class="d-flex" action="" method="POST">
                                        <input type="hidden" class="form-control" id="groups_id" name="groups_id" value="<?= $groups['groups_id']; ?>">
                                        <input class="form-control me-2" type="text" id="random_link" name="random_link" placeholder="Random Link" value="<?= (count($musics2) >= 1) ? $random['musics_link'] :  ''; ?>" required autocomplete="off">
                                        <button class="btn btn-danger" type="submit" name="random">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 groups">
                    <form id="groups_form" class="mb-3" style="display: none;" action="" method="POST">
                        <input type="hidden" class="form-control" id="groups_id" name="groups_id" value="<?= $groups['groups_id']; ?>">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="groups_name" id="groups_name" name="groups_name" value="<?= $groups['groups_name']; ?>" required autocomplete="off">
                            <label for="groups_name">Group Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="groups_des" id="groups_des" name="groups_des" style="height: 150px" required><?= $groups['groups_des']; ?></textarea>
                            <label for="groups_des">Group Description</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="groups_link" id="groups_link" name="groups_link" value="<?= $groups['groups_link']; ?>" required autocomplete=" off">
                            <label for="groups_link">Group Link</label>
                        </div>
                        <div class="text-end">
                            <button type="reset" class="btn btn-secondary" onclick="myFunction()">Cancel</button>
                            <button type="submit" class="btn btn-danger" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="musics mt-3 mb-5" id="musics">
        <div class="container">
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h3>Musics</h3>
                </div>
            </div>
            <div class="row">
                <?php foreach ($musics3 as $music) : ?>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3" style="cursor: pointer;" onclick="document.location.href = 'detail.php?group_id=<?= $groups2['groups_id']; ?>&music_link=<?= $music['musics_link']; ?>';">
                            <div class="row g-0">
                                <div class="col-xl-4 align-self-center text-center">
                                    <img src="<?= $music['musics_thumbnail']; ?>" class="img-fluid rounded" alt="..." width="100%">
                                </div>
                                <div class="col-xl-8 align-self-center">
                                    <div class="card-body">
                                        <p class="card-title fw-bold v-title"><?= $music['musics_name']; ?></p>
                                        <p class="card-text text-secondary"><?= $groups2['groups_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script>
        function myFunction() {
            var x = document.getElementById("groups_form");
            var y = document.getElementById("info");

            if (x.style.display === "block") {
                x.style.display = "none";
                y.style.display = "block";
            } else {
                x.style.display = "block";
                y.style.display = "none";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>