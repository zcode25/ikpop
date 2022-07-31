<?php

require 'functions.php';
$group_id = $_GET['group_id'];
$groups = query("SELECT * FROM groups WHERE groups_id = '$group_id'")[0];
$musics2 = query("SELECT * FROM musics WHERE groups_id = '$group_id' AND musics_name = 'Random'");

$groups2 = get_group($groups);

$musics3 = [];
if (count($musics2) >= 1) {
    $random = query("SELECT * FROM musics WHERE groups_id = '$group_id' AND musics_name = 'Random'")[0];
    $musics3 = get_musics($random);
}


?>

<?php include('layout/header.php') ?>
    <section class="list mt-4" id="list">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="https://www.youtube.com/embed/?list=<?= $random['musics_link']; ?>&index=<?php print rand(1, count($musics3)) ?>&controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video"></iframe>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="row mb-3">
                        <div class="col-md-2 col-xl-3 col-2">
                            <img src="<?= $groups2['groups_img']; ?>" class="img-fluid rounded" alt="..." style="cursor: pointer;" onclick="document.location.href = 'group.php?group_id=<?= $groups['groups_id']; ?>';">
                        </div>
                        <div class="col-md-10 col-xl-7 col-10 align-self-center">
                            <h6 class="card-title fw-bold mb-1"><?= $groups2['groups_name']; ?></h6>
                            <p class="card-text text-secondary fw-normal" style="font-size: 12px;"><?= number_format($groups2['subscriber'], 0, ".", "."); ?> Subscriber</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="card-text justify"><?= $groups['groups_des']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="musics mt-3 mb-5" id="musics">
        <div class="container">
            <div class="row">
                <h3 class="mb-3">Musics</h3>
                <?php foreach ($musics3 as $music) : ?>
                    <div class="col-md-4 col-xl-3">
                        <div class="row mb-3" style="cursor: pointer;" onclick="document.location.href = 'detail.php?group_id=<?= $groups2['groups_id']; ?>&music_link=<?= $music['musics_link']; ?>';">
                            <div class="align-self-center text-center">
                                <img src="<?= $music['musics_thumbnail']; ?>" class="img-fluid rounded" alt="..." width="100%">
                            </div>
                            <div class="align-self-center">
                                <p class="fw-bold v-title mt-3 mb-1"><?= $music['musics_name']; ?></p>
                                <p class="text-secondary"><?= $groups2['groups_name']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php include('layout/footer.php') ?>