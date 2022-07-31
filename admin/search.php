<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

require '../functions.php';
if (isset($_POST["submit"])) {

    $keyword = $_POST['search'];
    $groups = query("SELECT * FROM groups WHERE groups_name LIKE '%$keyword%'");
}

?>

<?php include('../layoutAdmin/header.php') ?>
    <section class="groups mt-3 mb-5" id="groups">
        <div class="container">
            <div class="row">
                <h3 class="mb-3">Groups</h3>
                <?php if (count($groups) >= 1) : ?>
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
                <?php else : ?>
                    <h5 class="text-secondary">Not Found</h5>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php include('../layoutAdmin/footer.php') ?>