<html lang="en">

<head>
    <title>FlytLabs | Unifye, a contact consolidation service meant for ease and security</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FlytLabs">
    <meta name="keywords" content="flytlabs, flyt, unifye, unifye.io, unifye lookup, importable, xobus, aesthetica, aiaesthetica, aestheticaai, aesthetica twitter, tech, technology, html, html5, hypertext markup language, css, css3, cascading style sheets, js, es6, javascript, python, python3, php, hypertext preprocessor">
    <meta name="description" content="Unifye | A contact consolidation service meant for ease and security">
    <meta name="format-detection" content="telephone=no">

    <link rel="shortcut icon" type="image/x-icon" href="../Assets/Icons/favicon.png">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer src="script.js"></script>

    <style>
        @import url('main.css');

        main {
            margin: 4em 5em 0 5em;
        }

        main section {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            column-gap: 2em;
        }

        main section div {
            align-self: center;
        }

        main section div h1 {
            font-weight: 600;
            font-size: 2.1em;
        }

        main section div p {
            margin-top: 1em;
            font-size: 1.2em;
            line-height: 1.5em;
        }

        main section div button {
            margin-top: 1.25em;
            padding: 1em 3em;
            color: white;
            font-size: .9em;
            font-weight: 600;
            background: linear-gradient(to left, var(--leftBlue), var(--rightBlue));
            border: none;
            border-radius: 100em;
            transition: .3s ease;
            box-shadow: 0 2px 8px rgba(42, 135, 251, .25);
        }

        main section div button:hover,
        main section div button:focus {
            cursor: pointer;
            filter: hue-rotate(10deg);
            transition: .3s ease;
        }

        main section div img {
            width: 85%;
            max-width: 30em;
            float: right;
        }

        main section:nth-child(2) div span.bar {
            color: var(--leftBlue);
            font-weight: 600;
            position: relative;
            bottom: 2px;
        }

        main section:nth-child(2) div img {
            min-width: 18em;
        }

        main section:not(:first-child) {
            margin-top: 4em;
        }

        main section:nth-child(2) p:not(:first-child) {
            margin-top: 1em;
        }

        main section p a {
            color: var(--rightBlue);
            text-decoration: none;
            transition: .3s ease;
        }

        main section p a:hover,
        main section p a:focus {
            filter: brightness(150%);
            transition: .3s ease;
        }

        main section:nth-child(3) div,
        main section:last-child div {
            text-align: right;
        }

        main section:nth-child(3) div img,
        main section:last-child div img {
            float: left;
        }

        @media only screen and (max-width: 1180px) {
            main section div h1 {
                font-size: 1.75em;
            }

            main section div p {
                font-size: 1.1em;
            }

            main section div button {
                font-size: .85em;
            }

            main section div img {
                width: 80%;
            }

            main section {
                column-gap: 2em;
            }
        }

        @media only screen and (max-width: 1020px) {
            main section {
                column-gap: 1em;
            }

            main section div h1 {
                font-size: 1.5em;
            }

            main section div p {
                font-size: 1em;
            }

            main section div button {
                font-size: .8em;
            }

            main section div img {
                width: 75%;
            }
        }

        @media only screen and (max-width: 900px) {
            main {
                margin: 5em 3em 0 3em;
            }

            main section div button {
                padding: 1em 2.85em;
            }
        }

        @media only screen and (max-width: 800px) {
            main section {
                column-gap: .75em;
            }

            main section div h1 {
                font-size: 1.4em;
            }

            main section div p {
                font-size: .95em;
                line-height: 1.4em;
            }

            main section div button {
                font-size: .75em;
                padding: 1em 2.75em;
            }

            main section div img {
                width: 65%;
                min-width: 18em;
            }
        }

        @media only screen and (max-width: 700px) {
            main {
                margin: 2em 5em 0 5em;
                position: relative;
            }

            main section {
                grid-template-columns: 1fr;
                column-gap: 0;
            }

            main section div {
                margin-top: 2em;
            }

            main section div button {
                padding: 1em 2.75em;
            }

            main section div.text {
                display: inline-block;
            }

            main section div img {
                width: 50%;
                min-width: 16em;
            }

            main section:nth-child(2) div img {
                margin: 3em auto 0 auto;
                display: block;
                float: none;
                width: 80%;
            }

            main section:nth-child(3) div.text,
            main section:last-child div.text {
                justify-self: end;
                grid-row: 1/2;
            }

            main section:nth-child(3) div.img-container,
            main section:last-child div.img-container {
                grid-row: 2/3;
            }
        }

        @media only screen and (max-width: 600px) {
            main {
                margin: 2em 4em 0 4em;
            }

            main section:nth-child(2) div img {
                width: 90%;
            }
        }

        @media only screen and (max-width: 500px) {
            main {
                margin: 2em 2em 0 2em;
            }

            main section:nth-child(2) div img {
                margin: 3em auto 0 auto;
                display: block;
                float: none;
                width: 100%;
            }
        }

        @media only screen and (max-width: 400px) {
            main {
                margin: 2em 1.5em 0 1.5em;
            }

            main section div {
                margin-top: 1.5em;
            }

            main section div h1 {
                font-size: 1.2em;
            }

            main section div p {
                font-size: .8em;
            }

            main section div img {
                min-width: 12em;
            }
        }

        @media only screen and (max-width: 360px) {
            main {
                margin: 2em 1em 0 1em;
            }
        }

        @media (prefers-color-scheme: dark) {
            main section p a {
                color: var(--main);
            }
        }
    </style>
</head>

<body>
    <?php require('Include/header.php'); ?>
    <main>
        <section>
            <div class="text">
                <h1>Project Unifye</h1>
                <p>
                    Unifye is a contact information consolidation service which primarily aims to cut the time it takes
                    people to find the places you're located online.
                </p>
                <button onclick="">Get Started</button>
            </div>
            <div class="img-container">
                <img src="../Assets/llustrations/unifye/unifye-1.svg" alt="SVG Image">
            </div>
        </section>
        <section>
            <div class="text">
                <h1>How it works</h1>
                <br>
                <p>
                    Our service achieves this by granting each user a username and a unique tag.
                </p>
                <p>
                    <span class="bar">|</span> Alex <br>
                    <span class="bar">|</span> Alex#4835
                </p>
                <br>
                <p>
                    When Alex shares his single username, the recipient may receive this selected information:
                </p>
                <p>
                    <span class="bar">|</span> Twitter: @alexjones <br>
                    <span class="bar">|</span> Instagram: @alexjones <br>
                </p>
                <br>
                <p>
                    However, the idea recognizes that maybe, Alex needs to share more personal details
                    with somebody. Alex gives his coworker:
                </p>
                <p>
                    <span class="bar">|</span> Alex#4835
                </p>
                <br>
                <p>
                    Then Alex tells his coworker to use the preferred contact place found at <a href="">unifye.io</a>.
                    When this is brought up, it reads:
                </p>
                <p>
                    <span class="bar">|</span> Twitter: @alexjones <br>
                    <span class="bar">|</span> Instagram: @alexjones <br>
                    <span class="bar">|</span> Email: alex@contact.me <br>
                    <span class="bar">|</span> Phone: 234-352-8285 <br>
                </p>
                <br>
                <p>
                    This is convenient as it offers his coworker a single place to find Alex's information. Thus, the
                    purpose of the service - consolidation of personal data - can occur. There's even more built-in
                    features to enhance privacy.
                </p>
            </div>
            <div class="img-container">
                <picture>
                    <source srcset="../Assets/llustrations/unifye/unifye-2_dark.svg"
                        media="(prefers-color-scheme: dark)">
                    <img src="../Assets/llustrations/unifye/unifye-2_light.svg" alt="Flowchart">
                </picture>
            </div>
        </section>
        <section>
            <div class="img-container">
                <img src="../Assets/llustrations/unifye/unifye-3.svg" alt="SVG Image">
            </div>
            <div class="text">
                <h1>It's about ease</h1>
                <p>
                    This enables the recipient to speedily receive multiple forms of contact info. In a professional
                    setting, a tag could be posted on a public face, so that recipients would
                    have immediate access to the desired contact points. Unifye is meant to simplify &amp;
                    unify the process of sharing and finding, keeping security in mind.
                </p>
            </div>
        </section>
        <section>
            <div class="text">
                <h1>It's about security</h1>
                <p>
                    Alex can set a password on this tag, destroy it at any time, or set it to self
                    destruct after a single use. Alex's username will remain the same to provide his public
                    information. This way Alex can destroy the tag after giving it to an untrusted stranger
                    or keep it from being viewed again if it was exchanged physically. Information is to be
                    encrypted to AES within storage.
                </p>
            </div>
            <div class="img-container">
                <img src="../Assets/llustrations/unifye/unifye-4.svg" alt="SVG Image">
            </div>
        </section>
        <section>
            <div class="img-container">
                <img src="../Assets/llustrations/unifye/unifye-5.svg" alt="SVG Image">
            </div>
            <div class="text">
                <h1>Interested? Try it today</h1>
                <p>
                    Visit <a href="">unifye.io</a> or click the button below. It's
                    completely secure, safe to use, and easy to get started!
                </p>
                <button onclick="">Get Started</button>
            </div>
        </section>
    </main>
    <?php require('Include/footer.php'); ?>
</body>

</html>