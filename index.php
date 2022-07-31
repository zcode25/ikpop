<?php

require 'functions.php';
$groups = query("SELECT * FROM groups ORDER BY groups_name");

$video = 'https://www.youtube.com/embed/F4aby5WN1Rw?controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1';

if (isset($_GET["live"])) {
    $video = "https://www.youtube.com/embed/" . $_GET["live"] . "?controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1";
}

if (isset($_GET["random"])) {
    $video = "https://www.youtube.com/embed/?list=" . $_GET["random"] . "&index=" . rand(1, 50) . "&controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1";
}

?>

<?php include('layout/header.php') ?>
    <section class="hero mt-4" id="hero">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="<?= $video; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video" id="video"></iframe>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card deskripsi mb-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <h3 class="card-title fw-bold">iKPOP</h3>
                                    <p class="card-text justify">iKPOP is a website that contains a collection of KPOP Streaming MVs. Enjoy the fun anywhere and anytime.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-12">
                            <div class="card mb-3" id="live" style="cursor: pointer;">
                                <div class="row g-0">
                                    <div class="col-2 text-center rounded" style="background-color: #EC227B;">
                                        <div class="p-3">
                                            <i class="bi bi-play-btn-fill" style="font-size: 25px"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <div class="card-body">
                                            <h6 class="card-text fw-bold">Live</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-12">
                            <div class="card mb-3" id="random" style="cursor: pointer;">
                                <div class="row g-0">
                                    <div class="col-2 text-center rounded" style="background-color: #EC227B;">
                                        <div class="p-3">
                                            <i class="bi bi-collection-play-fill" style="font-size: 25px"></i>
                                        </div>
                                    </div>
                                    <div class="col-10 align-self-center">
                                        <div class="card-body">
                                            <h6 class="card-text fw-bold">Random</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="groups mt-3 mb-5" id="groups">
        <div class="container">
            <div class="row">
                <h3 class="mb-3">Groups</h3>
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
<?php include('layout/footer.php') ?>