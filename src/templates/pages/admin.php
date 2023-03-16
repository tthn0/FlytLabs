<?php
require_once($GLOBALS["/"] . "/modules/admin.php");
?>

<body>
    <div class="max-container">
        <?php require($GLOBALS["/"] . "/templates/components/header.php"); ?>
        <main>
            <section>
                <div class="text">
                    <h1>Admin Panel</h1>
                    <p>
                        <?= $message ?>
                    </p>
                    <button onclick="location.href='/updates'">Make a Post</button>
                </div>
                <div class="img-container">
                    <img src="/assets/illustrations/pages/admin/1.svg" alt="SVG Image">
                </div>
            </section>
        </main>
    </div>
    <?php require($GLOBALS["/"] . "/templates/components/footer.php"); ?>
</body>