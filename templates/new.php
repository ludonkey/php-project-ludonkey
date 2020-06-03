<!DOCTYPE html>
<html lang="en">

<?php
include "inc/head.php";
?>

<body>
    <?php
    include "inc/nav.php";
    ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div id="login">
                    <form class="form-new" action="/new" method="POST">
                        <p>
                            <?php
                            if (isset($errorMsg)) {
                                echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                            }
                            ?>
                            <h5>&gt; New Code</h5>
                        </p>
                        <p>
                            <label>Language:</label>
                            <select name="language" class="form-control">
                                <option value="0">--choose--</option>
                                <?php
                                foreach ($languages as $oneLanguage) {
                                    $languageId = $oneLanguage->id;
                                    $languageName = $oneLanguage->name;
                                    $selected = ($_POST['language'] ?? "") == $languageId ? "selected" : "";
                                    echo "<option value=\"$languageId\" $selected>$languageName</option>";
                                }
                                ?>
                            </select>
                            <label>Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Title" value="<?= $_POST['title'] ?? "" ?>">
                            <label>Description:</label>
                            <input type="text" name="description" class="form-control" placeholder="Description" value="<?= $_POST['description'] ?? "" ?>">
                            <label>Content:</label>
                            <textarea row=8 name="content" class="form-control" placeholder="// Your code here"><?= $_POST['content'] ?? "" ?></textarea>
                        </p>
                        <p>
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Create</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "inc/footer.php";
    ?>

</body>

</html>