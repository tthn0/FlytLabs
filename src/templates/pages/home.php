<body>
    <div class="max-container">
        <?php require($GLOBALS["/"] . "/templates/components/header.php"); ?>
        <main>
            <section>
                <div class="text">
                    <h1>Say Hello to FlytLabs</h1>
                    <p>
                        We are a team of creative programmers building experimental, community driven software towards
                        the future. We're passionate about pushing boundaries and exploring innovative solutions that
                        revolutionize the way people interact with technology.
                    </p>
                    <button onclick="location.href='/about'">About Us</button>
                </div>
                <div class="img-container">
                    <img src="/assets/illustrations/pages/home/1.svg" alt="SVG Image">
                </div>
            </section>
            <section>
                <div class="img-container">
                    <img src="/assets/illustrations/pages/home/2.svg" alt="SVG Image">
                </div>
                <div class="text">
                    <h1>Built with modern, industry grade technologies</h1>
                    <p>
                        FlytLabs uses a versatile set of tools and bleeding edge technologies to solve problems and
                        bring modern, appealing solutions. Our goal is to bring these to everyone—from hobbyists, to
                        students, and even working professionals. We strive to create the most secure, dynamic, and
                        fluidly functioning applications.
                    </p>
                </div>
            </section>
            <section>
                <h1>Our Latest Projects</h1>
                <div onclick="location.href='/unifye'">
                    <img src="/assets/illustrations/pages/home/3.svg" alt="Unifye Image">
                    <p>Unifye</p>
                </div>
                <div onclick="location.href='/xobus'">
                    <img src="/assets/illustrations/pages/home/4.svg" alt="Xobus Image">
                    <p>Xobus AI</p>
                </div>
                <div onclick="location.href='/importable'">
                    <img src="/assets/illustrations/pages/home/5.svg" alt="Importable Image">
                    <p>Importable</p>
                </div>
            </section>
        </main>
    </div>
    <?php require($GLOBALS["/"] . "/templates/components/footer.php"); ?>
</body>