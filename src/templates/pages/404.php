<body>
    <div class="max-container">
        <?php require($GLOBALS["/"] . "/templates/components/header.php"); ?>
        <main>
            <section>
                <div class="text">
                    <h1>Uh oh! 404</h1>
                    <p>
                        That wasn't supposed to happen. It seems like the link you followed may have been broken or the
                        page doesn't exist.
                    </p>
                    <button onclick="location.href='/'">Go Home</button>
                </div>
                <div class="img-container">
                    <img src="/assets/illustrations/pages/404/1.svg" alt="404 Image">
                </div>
            </section>
        </main>
    </div>
    <?php require($GLOBALS["/"] . "/templates/components/footer.php"); ?>
</body>