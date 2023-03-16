<?php
require_once($GLOBALS["/"] . "/modules/database.php");
require_once($GLOBALS["/"] . "/modules/updates.php");
require_once($GLOBALS["/"] . "/modules/utilities.php");

if (isset($_POST["delete_post"]))
    Updates::delete($_POST);
else if (isset($_POST["newBody"]))
    Updates::update($_POST);
?>

<script src="/assets/js/pages/post.js"></script>

<!-- Group this form with the "Save" button -->
<form name="form" method="POST">
    <input type="hidden" name="newBody">
    <input type="hidden" name="id">
</form>

<body>
    <div class="max-container">
        <?php require($GLOBALS["/"] . "/templates/components/header.php"); ?>
        <main>
            <section>
                <?php
                $id = $_GET["id"] ?? null;

                if (!$id) {
                    redirect("/404");
                    die();
                }

                $posts = Database::query("SELECT * FROM posts WHERE id = ?", [$id]);

                if (empty($posts)) {
                    redirect("/404");
                    die();
                }

                $post = $posts[0];

                $title = htmlspecialchars($post["title"]);
                $body = htmlspecialchars($post["body"]);
                $image = $post["image"];
                $epoch = $post["epoch"];
                $edit_delete = null;

                $body = str_replace("\r\n", "<br>", $body);

                $image = $image ? "<img src='{$image}'alt='Posted Image'>" : null;

                date_default_timezone_set("America/Chicago");
                $date = date('F j, Y \a\t g:i a', $epoch);

                if (IS_ADMIN) {
                    $edit_delete = <<<EDIT_DELETE
                        <form method="POST">
                            <input type="text" name="edit" onclick="toggleEdit()">
                            <i class="fas fa-edit"></i>
                            <input type="submit" name="delete_post" value="$id" tabindex="-1">
                            <i class="fa fa-trash"></i>
                        </form>
                    EDIT_DELETE;
                }

                echo <<<CARD
                    <div class="card">
                        $image
                        $edit_delete
                        <div>
                            <div class="top">
                                <span class="title">$title</span>
                                <span class="date">$date</span>
                            </div>
                            <div class="body" id="body">$body</div>
                            <button onclick="submitForm($id)">Save</button>
                            <br><br>
                            <a onclick="goBack()">‹ Back to updates</a>
                        </div>
                    </div>
                CARD;
                ?>
            </section>
        </main>
    </div>
    <?php require($GLOBALS["/"] . "/templates/components/footer.php"); ?>
</body>