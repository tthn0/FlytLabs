<html lang="en">

<head>
    <title>FlytLabs | Importable, a service to enable developers a more universal access to plugins, modules, configurations, and other types of files found across the internet</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FlytLabs">
    <meta name="keywords" content="flytlabs, flyt, unifye, unifye.io, unifye lookup, importable, xobus, aesthetica, aiaesthetica, aestheticaai, aesthetica twitter, tech, technology, html, html5, hypertext markup language, css, css3, cascading style sheets, js, es6, javascript, python, python3, php, hypertext preprocessor">
    <meta name="description" content="Importable | A service to enable developers a more universal access to plugins, modules, configurations, and other types of files found across the internet">
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
            margin-top: 2em;
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

        main section p a {
            color: var(--rightBlue);
            text-decoration: none;
            transition: .3s ease;
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

        main section:nth-child(2) div {
            text-align: right;
        }

        main section:nth-child(2) div img {
            float: left;
        }

        @media only screen and (max-width: 1180px) {

            main section {
                column-gap: 2em;
            }

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

            main section:nth-child(2) {
                margin-top: 2em;
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

            main section div img {
                width: 65%;
                min-width: 18em;
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

            main section:nth-child(2) {
                margin-top: 1.75em;
            }

            main section:nth-child(3) {
                column-gap: .75em;
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

            main section div.text {
                display: inline-block;
            }

            main section div button {
                padding: 1em 2.75em;
            }

            main section div img {
                width: 50%;
                min-width: 16em;
            }

            main section:nth-child(2) div.text {
                justify-self: end;
                grid-row: 1/2;
            }

            main section:nth-child(2) div.img-container {
                grid-row: 2/3;
            }
        }

        @media only screen and (max-width: 600px) {
            main {
                margin: 2em 4em 0 4em;
            }

            main section div img {
                min-width: 14em;
            }
        }

        @media only screen and (max-width: 500px) {
            main {
                margin: 2em 2em 0 2em;
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
                <h1>What is Importable?</h1>
                <p>
                    We aim to build Importable around the Xobus AI Platform. Importable will be a service to enable
                    developers a more universal access to plugins, modules, configurations, and other types of files
                    found across the internet.
                </p>
                <!-- <button onclick="">Learn More</button> -->
            </div>
            <div class="img-container">
                <img src="../Assets/llustrations/importable/importable-1.svg" alt="SVG Image">
            </div>
        </section>
        <section>
            <div class="img-container">
                <img src="../Assets/llustrations/importable/importable-2.svg" alt="SVG Image">
            </div>
            <div class="text">
                <h1>Why Create Importable?</h1>
                <p>
                    Importable is specifically designed to aid development environments, looking to increase workflow
                    efficiency, and software - component knowledge and availability in a before unseen manner.
                </p>
            </div>
        </section>
        <section>
            <div class="text">
                <h1>Our Goal</h1>
                <p>
                Importable was created to help further FlytLabs' goal and reach into the developer market,
                creating tools which we believe in due to our roots in what we do. Importable is still
                under development, and we'll provide updates and a more accurate timeframe for release as
                it progresses <a href="updates.php">here</a>.
                <!-- with an anticipated completion date set at August 1, 2020. -->
                </p>
            </div>
            <div class="img-container">
                <img src="../Assets/llustrations/importable/importable-3.svg" alt="SVG Image">
            </div>
        </section>
    </main>
    <?php require('Include/footer.php'); ?>
</body>

</html>