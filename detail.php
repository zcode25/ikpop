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

<?php include('layout/header.php') ?>
    <section class="main mt-4 mb-5" id="main">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="https://www.youtube.com/embed/<?= $music['musics_link']; ?>/?controls=1&showinfo=0&rel=0&loop=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video"></iframe>
                    </div>
                    <h5 class="mb-2 my-3 fw-bold lh-base"><?= $music['musics_name']; ?></h5>
                    <?php $tgl = date_create($music['musics_date']); ?>
                    <p class="mb-3"><?= date_format($tgl, 'd F Y') ?></p>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-1 col-xl-1 col-2">
                            <img src="<?= $groups2['groups_img']; ?>" class="img-fluid rounded" alt="..." width="100%" style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $groups2['groups_id']; ?>';">
                        </div>
                        <div class="col-md-11 col-xl-11 col-10 align-self-center">
                            <p class="card-title fw-bold mb-1" style="cursor: pointer; font-size: 14px;" onclick="document.location.href = 'group.php?group_id=<?= $groups2['groups_id']; ?>';"><?= $groups2['groups_name']; ?></p>
                            <p class="card-text text-secondary fw-normal" style="font-size: 12px;"><?= number_format($groups2['subscriber'], 0, ".", "."); ?> Subscriber</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col">
                            <a href="https://convert2mp3s.com/api/widgetv2?url=https://www.youtube.com/watch?v=<?= $music['musics_link']; ?>" class="btn btn-danger btn-sm" target="_blank">Download music <?= $music['musics_name']; ?></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <pre class="justify pb-2 des"><?= $music['musics_des']; ?></pre>
                        </div>
                    </div>            
                    <hr>
                    <div class="row my-3">
                        <div class="col align-self-center">
                            <h6>Comments</h6>
                        </div>
                    </div>
                    <?php foreach ($comments as $comment) : ?>
                        <div class="row mt-4">
                            <div class="col-md-1 col-xl-1 col-2">
                                <img src="<?= $comment['comments_img']; ?>" class="img-fluid rounded" alt="..." width="100%">
                            </div>
                            <div class="col-md-11 col-xl-11 col-10 align-self-center">
                                <?php $tgl2 = date_create($comment['comments_date']); ?>
                                <p class="fw-bold mb-1"><?= $comment['comments_name']; ?> <span class="tanggal fw-normal text-secondary ms-1" style="font-size: 12px;"><?= date_format($tgl2, 'd F Y') ?></span></p>
                                <p><?= $comment['comments_textDisplay']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <hr>
                </div>
                <div class="col-xl-4">
                    <div class="row">
                        <?php foreach ($musics3 as $music) : ?>
                            <div class="col-xl-12">
                                <div class="row mb-3" style="cursor: pointer;" onclick="document.location.href = 'detail.php?group_id=<?= $groups2['groups_id']; ?>&music_link=<?= $music['musics_link']; ?>';">
                                    <div class="col-4 text-center">
                                        <img src="<?= $music['musics_thumbnail']; ?>" class="img-fluid rounded" alt="..." width="100%">
                                    </div>
                                    <div class="col-8">
                                        <p class="fw-bold v-title mb-1"><?= $music['musics_name']; ?></p>
                                        <p class="text-secondary" style="font-size: 12px;"><?= $groups2['groups_name']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('layout/footer.php') ?>