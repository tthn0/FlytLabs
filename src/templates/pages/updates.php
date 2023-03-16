<?php
require_once($GLOBALS["/"] . "/modules/updates.php");

if (isset($_POST["post_update"]))
    Updates::post($_POST, $_FILES);
else if (isset($_POST["delete_post"]))
    Updates::delete($_POST);
?>

<script src="/assets/js/pages/updates.js"></script>

<body>
    <div class="max-container">
        <?php require($GLOBALS["/"] . "/templates/components/header.php"); ?>
        <main>
            <section>
                <h1>Updates</h1>
                <?php Updates::display_admin_screen(); ?>
                <?php Updates::display_cards(); ?>
            </section>
        </main>
    </div>
    <?php require($GLOBALS["/"] . "/templates/components/footer.php"); ?>
</body>