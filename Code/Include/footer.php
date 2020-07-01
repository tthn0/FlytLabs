<?php
    require_once('Include/classes.php');
    if(isset($_POST['news'])) {
        // new Newsletter($_POST);
    }
?>
<footer>
    <section>
        <div>
            <h1>Extras</h1>
            <a href="about.php">About</a> <br>
            <a href="updates.php">Updates</a> <br>
            <a href="help.php">Help Us</a> <br>
        </div>
        <div>
            <h1>Legal</h1>
            <a href="cookies.php">Cookies</a> <br>
            <a href="privacy.php">Privacy</a> <br>
            <a href="terms.php">Terms</a> <br>
        </div>
        <div>
            <h1>Contact</h1>
            <a href="mailto:inquires@flytlabs.dev">inquires@flytlabs.dev</a><br>
            <a href="http://instagram.com/flytlabs" target="_blank"><i class="fab fa-instagram"></i>
                @flytlabs</a><br>
            <a href="http://twitter.com/flytlabs" target="_blank"><i class="fab fa-twitter"></i> @FlytLabs</a><br>
            <!-- <a href="http://instagram.com/flytlabs" target="_blank"><b>ig</b>: @flytlabs</a> <br>
            <a href="http://twitter.com/flytlabs" target="_blank"><b>tw</b>: @FlytLabs</a> <br> -->
        </div>
        <div>
            <h1>Newsletter</h1>
            <form autocomplete="off" method="POST">
                <input type="email" name="email" placeholder="example@contact.me" required><br>
                <input type="hidden" name="honeypot">
                <input type="submit" name="news" value="Sign Up">
            </form>
        </div>
    </section>
    <div>
        <p>
            &copy; FlytLabs <?= date("Y") ?>. All Rights Reserved.
        </p>
    </div>
</footer>