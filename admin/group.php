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


<?php include('../layoutAdmin/header.php') ?>
    <section class="list mt-4" id="list">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 mb-3">
                    <div class="videoWrapper">
                        <iframe src="https://www.youtube.com/embed/?list=<?= $random['musics_link']; ?>&index=<?php print rand(1, count($musics3)) ?>&controls=1&showinfo=0&rel=0&loop=1&autoplay=1&mute=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="YouTube video player" frameborder="0" class="video"></iframe>
                    </div>
                </div>
                <div class="col-xl-4" id="info">
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
                        <div class="col-12 groups">
                            <form class="d-flex" action="" method="POST">
                                <input type="hidden" class="form-control" id="groups_id" name="groups_id" value="<?= $groups['groups_id']; ?>">
                                <input class="form-control me-2" type="text" id="random_link" name="random_link" placeholder="Random Link" value="<?= (count($musics2) >= 1) ? $random['musics_link'] :  ''; ?>" required autocomplete="off">
                                <button class="btn btn-danger" type="submit" name="random">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="card-text justify"><?= $groups['groups_des']; ?></p>
                            <div class="text-end">
                                <form action="" method="POST">
                                    <input type="hidden" class="form-control" id="groups_id" name="groups_id" value="<?= $groups['groups_id']; ?>">
                                    <button class="btn btn-danger" type="button" onclick="myFunction()">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-danger" type="submit" name="delete" onclick=" return confirm ('Apakah anda yakin?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
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
<?php include('../layoutAdmin/footer.php') ?>