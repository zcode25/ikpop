<?php

require 'functions.php';
$group_id = $_GET['group_id'];
$music_link = $_GET['music_link'];
$groups = query("SELECT * FROM groups WHERE groups_id = '$group_id'")[0];
$random = query("SELECT * FROM musics WHERE groups_id = '$group_id' AND musics_name = 'Random'")[0];

$groups2 = get_group($groups);
$music = get_music($music_link);
$comments = get_comments($music_link);
$musics3 = get_musics($random);

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

    <section class="main mt-4 mb-5" id="main">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="https://www.youtube.com/embed/<?= $music['musics_link']; ?>/?controls=1&showinfo=0&rel=0&loop=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video"></iframe>
                    </div>
                    <h6 class="lh-base my-3"><?= $music['musics_name']; ?></h6>
                    <?php $tgl = date_create($music['musics_date']); ?>
                    <p class="text-secondary mb-3"><?= date_format($tgl, 'd F Y') ?></p>
                    <hr>
                    <div class="card mb-3" style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $groups2['groups_id']; ?>';">
                        <div class="row g-0">
                            <div class="col-md-2 col-xl-2 col-4 align-self-center">
                                <img src="<?= $groups2['groups_img']; ?>" class="img-fluid rounded" alt="...">
                            </div>
                            <div class="col-md-10 col-xl-10 col-8 align-self-center">
                                <div class="card-body">
                                    <h6 class="card-title fw-bold"><?= $groups2['groups_name']; ?></h6>
                                    <p class="card-text text-secondary fw-normal" style="font-size: 14px;"><?= number_format($groups2['subscriber'], 0, ".", "."); ?> Subscriber</p>
                                    <div class="g-ytsubscribe" data-channelid="<?= $groups2['groups_link']; ?>" data-layout="default" data-count="hidden"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card deskripsi mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <pre class="card-text justify py-3 des"><?= $music['musics_des']; ?></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row my-3">
                        <div class="col align-self-center">
                            <h6>Comments</h6>
                        </div>
                    </div>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="card my-3">
                            <div class="row g-0">
                                <div class="col-md-1 col-xl-1 col-2 align-self-center">
                                    <img src="<?= $comment['comments_img']; ?>" class="img-fluid rounded" alt="..." width="100%">
                                </div>
                                <div class="col-md-11 col-xl-11 col-10 align-self-center">
                                    <div class="card-body">
                                        <?php $tgl2 = date_create($comment['comments_date']); ?>
                                        <p class="card-title fw-bold"><?= $comment['comments_name']; ?></p>
                                        <span class="tanggal fw-normal text-secondary"><?= date_format($tgl2, 'd F Y') ?></span>
                                        <p class="card-text"><?= $comment['comments_textDisplay']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                </div>
                <div class="col-xl-4">
                    <div class="row">
                        <?php foreach ($musics3 as $music) : ?>
                            <div class="col-md-6 col-xl-12">
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
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>