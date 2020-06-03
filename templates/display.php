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

        <div class="row masonry-grid">
            <div class="col-md-6 col-lg-4 masonry-column">
                <?php
                if (count($items) == 0) {
                    echo '<p class="no-result">No result.</p>';
                }
                $oneColumnItemNumber = ceil(count($items) / 3);
                $itemNumber = 0;
                foreach ($items as $oneCode) {
                    if ($itemNumber > 0 && ($itemNumber % $oneColumnItemNumber) == 0) {
                        echo '</div><div class="col-md-6 col-lg-4 masonry-column">';
                    }
                ?>
                    <div class="card card-block">
                        <div class="card-body">
                            <h5 class="card-title"><svg width="16" height="16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6.675l-1.8-.6c-.2-.1-.3-.3-.2-.4l.9-1.7c.6-1.2-.7-2.5-1.9-1.9l-1.7.9c-.1.1-.3 0-.4-.2l-.6-1.8c-.4-1.3-2.2-1.3-2.6 0l-.6 1.8c-.1.2-.3.3-.4.2l-1.7-.9c-1.2-.6-2.5.7-1.9 1.9l.9 1.7c.1.1 0 .3-.2.4l-1.8.6c-1.3.4-1.3 2.3 0 2.7l1.8.6c.2 0 .3.2.2.3l-.9 1.7c-.6 1.2.7 2.5 1.9 1.9l1.7-.9c.2-.1.4 0 .4.2l.6 1.8c.4 1.3 2.3 1.3 2.7 0l.6-1.8c.1-.2.3-.3.4-.2l1.7.9c1.2.6 2.5-.7 1.9-1.9l-1-1.7c-.1-.2 0-.4.2-.4l1.8-.6c1.3-.4 1.3-2.2 0-2.6zm-7 3.7c-1.3 0-2.4-1.1-2.4-2.4 0-1.3 1.1-2.4 2.4-2.4 1.3 0 2.4 1.1 2.4 2.4 0 1.3-1.1 2.4-2.4 2.4z" fill="#CCC"></path>
                                </svg> <?= htmlentities($oneCode->title) ?> <a href="/?search=%23<?= $oneCode->language->name ?>"><span class="badge badge-secondary lg-<?= $oneCode->language->name ?>">
                                        #<?= strtoupper($oneCode->language->name) ?></span></a></h5>
                            <pre><code id="code_<?= $oneCode->id ?>" class="<?= $oneCode->language->name ?>"><?= htmlentities($oneCode->content) ?></code></pre>
                            <hr />
                            <p class="card-text">
                                <?= htmlentities($oneCode->description) ?>
                                <footer class="blockquote-footer"><a href="/?search=%40<?= $oneCode->user->nickname ?>" class="text-decoration-none">@<?= $oneCode->user->nickname ?></a></footer>
                            </p>
                            <a class="btn btn-primary btn-cpy" data-clipboard-target="#code_<?= $oneCode->id ?>">Copy</a>
                        </div>
                    </div>
                <?php
                    $itemNumber++;
                }
                ?>
            </div>
        </div>
    </div>

    <?php
    include "inc/footer.php";
    ?>

</body>

</html>