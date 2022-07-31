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


<?php include('../layoutAdmin/header.php') ?>
    <section class="groups mt-4 mb-5" id="groups">
        <div class="container">
            <div class="row mb-3">
                <div class="col align-self-center">
                    <h3>Groups</h3>
                </div>
                <div class="col align-self-center text-end">
                    <button class="btn btn-danger" type="button" onclick="myFunction()">
                        <i class="bi bi-plus"></i>
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
<?php include('../layoutAdmin/footer.php') ?>