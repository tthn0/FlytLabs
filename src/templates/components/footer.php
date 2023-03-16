<?php
// require_once($GLOBALS["/"] . "/modules/newsletter.php");
// if (isset($_POST["newsletter"]))
//     Newsletter::add_email($_POST);
?>

<!-- The following script is for the social icons. -->
<script defer src="https://kit.fontawesome.com/a81368914c.js"></script>
<footer>
    <section>
        <div>
            <h1>Extras</h1>
            <a href="/about">About</a> <br>
            <a href="/updates">Updates</a> <br>
            <a href="/help">Help Us</a> <br>
        </div>
        <div>
            <h1>Legal</h1>
            <a href="/cookies">Cookies</a> <br>
            <a href="/privacy">Privacy</a> <br>
            <a href="/terms">Terms</a> <br>
        </div>
        <div>
            <h1>Contact</h1>
            <a href="mailto:inquires@flytlabs.dev">
                inquires@flytlabs.dev
            </a>
            <br>
            <a href="https://instagram.com/flytlabs" target="_blank">
                <i class="fab fa-instagram"></i>
                @flytlabs
            </a>
            <br>
            <a href="https://twitter.com/flytlabs" target="_blank">
                <i class="fab fa-twitter"></i>
                @FlytLabs
            </a>
        </div>
        <div>
            <h1>Newsletter</h1>
            <form autocomplete="off" method="POST">
                <input type="email" name="email" placeholder="name@contact.me" required><br>
                <input type="hidden" name="honeypot">
                <input type="submit" name="newsletter" value="Sign Up">
            </form>
        </div>
    </section>
    <div>
        <p>
            &copy; FlytLabs
            <?= date("Y") ?>.
            All Rights Reserved.
        </p>
    </div>
</footer>