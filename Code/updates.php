<?php
    require('Include/classes.php');

    // if($_GET['admin'] == true) {
    //     if(!isset($_COOKIE['PASSWORD'])) {
    //         echo '<script>
    //             alert("You will be granted admin rights for 5 minutes.");
    //         </script>';
    //         setcookie('PASSWORD', PW, time() + 300, '/', NULL, NULL, true);
    //         echo '<script>
    //             location.href="updates.php";
    //         </script>';
    //     }
    // }

    if(isset($_POST['post'])) {
        if($_FILES['image']['size'] > 0 && $_FILES['image']['error'] != 0) {
            echo '<script>
                alert(`Message from Thomas: Please try a smaller image file size. Also, notify me about this error code: ' . $_FILES['image']['error'] . '`);
            </script>';
        } else {
            new Post($_POST, $_FILES);
        }
    }
?>

<html lang="en">

<head>
    <title>FlytLabs | See the latest updates from our projects here</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FlytLabs">
    <meta name="keywords" content="flytlabs, flyt, unifye, unifye.io, unifye lookup, importable, xobus, aesthetica, aiaesthetica, aestheticaai, aesthetica twitter, tech, technology, html, html5, hypertext markup language, css, css3, cascading style sheets, js, es6, javascript, python, python3, php, hypertext preprocessor">
    <meta name="description" content="Updates | See the latest updates from our projects here">
    <meta name="format-detection" content="telephone=no">

    <link rel="shortcut icon" type="image/x-icon" href="../Assets/Icons/favicon.png">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script defer src="script.js"></script>

    <style>
        @import url('main.css');

        body {
            background-image: none !important;
        }

        main {
            margin: 8em auto 0 auto;
            max-width: 46em;
        }

        main section {
            display: grid;
            grid-template-columns: 1fr;
        }

        main section > form {
            width: 100%;
        }

        main section > form h1 {
            font-weight: 600;
            font-size: 2em;
        }

        main section > form span {
            display: block;
            width: 100%;
            margin-top: .75em;
        }

        main section > form span:first-of-type {
            margin-top: 2em;
        }

        main section > form input:not([type="submit"]),
        main section > form textarea {
            border: none;
            width: 100%;
            border-radius: 5px;
            box-sizing: border-box;
            padding: .75em 1em;
            font-size: .9em;
            font-weight: 500;
            background: rgb(246, 246, 246);
            transition: .3s ease;
        }

        main section > form input:not([type="submit"]):focus,
        main section > form textarea:focus {
            outline: none;
            background: rgb(240, 240, 240);
            transition: .3s ease;
        }

        main section > form textarea {
            height: 10em;
            resize: vertical;
            font-weight: 400;
        }

        main section > form input[type="submit"] {
            margin-top: 2em;
            padding: .75em 3em;
            border-radius: 100em;
            border: none;
            color: white;
            background: linear-gradient(to left, var(--leftGreen), var(--rightGreen));
            transition: .3s ease;
            font-size: .9em;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(52, 235, 206, .25);
        }

        main section > form input[type="submit"]:hover,
        main section > form input[type="submit"]:focus {
            cursor: pointer;
            filter: hue-rotate(10deg);
            transition: .3s ease;
        }

        main section div p a {
            color: var(--rightBlue);
            text-decoration: none;
            transition: .3s ease;
        }

        main section div p a:hover,
        main section div p a:focus {
            filter: brightness(150%);
            transition: .3s ease;
        }

        main div.post {
            margin-top: 3em;
            border-radius: .5em;
            background: rgb(246, 246, 246);
        }

        main div.post > div {
            padding: 2em;
        }

        main div.post div.top span {
            display: block;
        }

        main div.post div.top span.title {
            font-size: 1.5em;
            font-weight: 600;
        }

        main div.post div.top span.time {
            margin-top: 1em;
            font-size: .8em;
            font-weight: 600;
            color: rgb(100, 100, 100);
        }

        main div.post img {
            width: 100%;
            border-radius: .5em .5em 0 0;
            filter: brightness(110%) hue-rotate(1deg);
        }

        main div.post p.body {
            margin-top: 2em;
            line-height: 1.75em;
        }

        main div.post a {
            display: inline-block;
            margin-top: 1em;
            font-size: .8em;
            font-weight: 600;
            color: rgb(25, 151, 243);
            text-decoration: none;
            transition: .3s ease;
        }

        main div.post a:hover {
            filter: brightness(150%);
        }

        main section div.post form {
            position: relative;
            margin-top: 1em;
            display: inline-block;
        }

        main section div.post form input {
            font-size: .8em;
            font-weight: 600;
            color: rgb(25, 151, 243);
            min-width: 4em;
            max-width: 4em;
            border: none;
            transition: .3s ease;
            position: absolute;
            z-index: 1;
            opacity: 0;
        }

        main section div.post form p.delete {
            font-size: .8em;
            font-weight: 600;
            color: rgb(232, 0, 0) !important;
            background: none;
            border: none;
            transition: .3s ease;
        }

        main section div.post form:hover p.delete {
            filter: brightness(200%);
            transition: .3s ease;
        }

        main section div.post form input:hover {
            cursor: pointer;
        }

        main section div.post form i {
            position: absolute;
            right: 0;
        }

        /* @media only screen and (max-width: 1180px) {
            
        } */

        /* @media only screen and (max-width: 1020px) {

        } */

        @media only screen and (max-width: 900px) {
            main {
                margin: 5em 3em 0 3em;
                max-width: 100%;
            }
        }

        @media only screen and (max-width: 800px) {
            main section > form h1 {
                font-size: 1.8em;
            }
        }

        @media only screen and (max-width: 700px) {
            main {
                margin: 2em 5em 0 5em;
                position: relative;
            }

            main section > form {
                margin-top: 2em;
            }

            main section > form h1 {
                font-size: 1.6em;
            }

            main section > form input:not([type="submit"]),
            main section > form textarea {
                font-size: .8em;
            }

            main section > form input[type="submit"] {
                font-size: .8em;
            }

            main div.post {
                font-size: .9em;
            }

            main div.post p.body {
                margin-top: 1.5em;
            }

            main section div.post form {
                margin-top: 1.5em;
            }

            main section div.post form input[name="edit"] {
                font-size: .8em;
            }
        }

        @media only screen and (max-width: 600px) {
            main {
                margin: 2em 4em 0 4em;
            }
            
            main div.post {
                font-size: .8em;
            }
        }

        @media only screen and (max-width: 500px) {
            main {
                margin: 2em 2em 0 2em;
            }
        }

        @media only screen and (max-width: 400px) {
            main {
                margin: 1em 1.5em 0 1.5em;
            }

            main section > form h1 {
                font-size: 1.4em;
            }

            main section > form input:not([type="submit"]),
            main section > form textarea {
                font-size: .7em;
            }

            main section > form input[type="submit"] {
                font-size: .7em;
            }

            main div.post {
                font-size: .75em;
            }

            main div.post div.top span.title {
                font-size: 1.25em;
            }

            main div.post div.top span.time {
                font-size: .5em;
            }
        }

        @media only screen and (max-width: 360px) {
            main {
                margin: 0 1em 0 1em;
            }

            main section > form h1 {
                font-size: 1.2em;
            }

            main div.post {
                font-size: .6em;
            }

            main div.post div.top span.title {
                font-size: 1.1em;
            }

            main div.post div.top span.time {
                font-size: .45em;
            }
        }

        @media (prefers-color-scheme: dark) {
            main section > form input:not([type="submit"]),
            main section > form textarea {
                background: var(--dark);
                color: aliceblue;
            }

            main section > form input:not([type="submit"]):focus,
            main section > form textarea:focus {
                outline: none;
                background: rgb(28, 40, 46);
                transition: .3s ease;
            }

            main section > form input:not([type="submit"])::placeholder,
            main section > form textarea::placeholder {
                color: rgb(200, 200, 200);
            }

            main div.post {
                background: var(--dark);
            }

            main div.post span.title {
                color: aliceblue;
            }

            main section div.post form i {
                color: aliceblue;
            }

        }
    </style>
</head>

<body>
    <?php require('Include/header.php'); ?>
    <main>
        <section>
            <form autocomplete="off" method="POST" enctype="multipart/form-data">
                <h1>Updates</h1>
                <style>
                    input[type="file"] {
                        width: 0.1px;
                        height: 0.1px;
                        opacity: 0;
                        overflow: hidden;
                        position: absolute;
                        z-index: -1;
                    }

                    input[type="file"] + label {
                        margin-top: .75em;
                        display: block;
                        text-align: center;
                        width: 100%;
                        border-radius: 5px;
                        padding: 1em 0;
                        font-size: .9em;
                        font-weight: 500;
                        background: rgb(246, 246, 246);
                        transition: .3s ease;
                    }
                    
                    input[type="file"] + label:hover,
                    input[type="file"]:focus + label {
                        background-color: rgb(240, 240, 240);
                        cursor: pointer;
                    }

                    @media only screen and (max-width: 700px) {
                        input[type="file"] + label {
                            font-size: .8em;
                        }
                    }

                    @media only screen and (max-width: 400px) {
                        input[type="file"] + label {
                            font-size: .7em;
                        }
                    }

                    @media (prefers-color-scheme: dark) {
                        input[type="file"] + label {
                            background: var(--dark);
                            color: rgb(200, 200, 200);
                        }
                        input[type="file"] + label:hover,
                        input[type="file"]:focus + label {
                            background-color: rgb(28, 40, 46);
                        }
                    }
                </style>
                <?php 
                    if(isset($_COOKIE['PASSWORD'])) {
                        if($_COOKIE['PASSWORD'] == PW) {
                            echo '
                                <!-- <span><input type="text" name="name" placeholder="Name" required></span> -->
                                <span><input type="text" name="title" placeholder="Title Your Post" required></span>
                                <span><textarea name="body" placeholder="Say something to the FlytLabs community..." required></textarea></span>
                                <input type="file" name="image" id="file" accept="image/png, image/jpeg" onchange="update()"/>
                                <label for="file">Choose Thumbnail Image</label>
                                <input type="submit" name="post" value="Post">
                            ';
                        }
                    }
                ?>
                <script>
                    function update() {
                        let filename = document.getElementById('file').files[0].name;
                        
                        document.querySelector('label').innerHTML = 'Selected: ' + filename;
                    }
                </script>
            </form>
            <!-- <div class="post">
                <img src="../Assets/Images/code.png" alt="Placeholder Image">
                <div>
                    <div class="top">
                        <span class="title">Placeholder Post</span>
                        <span class="time">Posted 0s ago</span>
                    </div>
                    <p class="body">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut id felis nibh.
                        Cras urna enim, euismod et tristique vel, cursus eget magna. Nulla sollicitudin
                        metus sit amet libero suscipit maximus. Quisque est eros, tincidunt in efficitur
                        at, cursus dignissim ipsum. Mauris at varius ligula...
                    </p>
                    <a href="">Read More</a>
                    <form method="POST">
                        <input type="submit" name="edit" value="Edit">
                        <input type="submit" name="delete" value="Delete" tabindex="-1">
                        <i class="fa fa-trash"></i>
                    </form>
                </div>
            </div> -->
            <?php
                $posts = DB::query(
                    'SELECT * FROM posts ORDER BY id DESC', []
                );
                foreach($posts as $p) {

                    $id = $p['id'];
                    $title = htmlspecialchars($p['title']);
                    $body = strip_tags($p['body'], '<br>');
                    $image = $p['image'];
                    $date = time() - intval($p['date']);
                    $form = '';
                    $more = '';

                    if($date < 60) {
                        $time = strval($date) . 's ago';
                    } else if ($date < 3600) {
                        $time = strval(intval($date/60)) . 'm ago';
                    } else if($date < 86400) {
                        $time = strval(intval($date/3660)) . 'h ago';
                    } else if($date < 604800) {
                        $time = strval(intval($date/86400)) . 'd ago';
                    } else {
                        $time = strval(intval($date/604800)) . 'w ago';
                    }

                    if($image) {
                        $image = '<img src="' . $image . '" alt="Posted Image">';
                    }

                    if(isset($_COOKIE['PASSWORD'])) {
                        if($_COOKIE['PASSWORD'] == PW) {
                            $form = '
                                <form method="POST">
                                    <input type="submit" name="delete" value="' . $id . '">
                                    <p class="delete">Delete</p>
                                </form>
                            ';
                        }
                    }

                    if(strlen($body) > 400) {
                        $more = '<a href="post.php?id='. $id .'">Read More</a>';
                        $body = substr($body, 0, 400) . '...';
                    }

                    if($more) {
                        $form = null;
                    }
                    
                    echo '
                        <div class="post">
                            ' . $image . '
                            <div>
                                <div class="top">
                                    <span class="title">' . $title . '</span>
                                    <span class="time">Posted ' . $time . '</span>
                                </div>
                                <p class="body">
                                    ' . $body . '
                                </p>
                                ' . $more . $form . '
                            </div>
                        </div>
                    ';
                    
                    if(isset($_POST['delete'])){
                        DB::query('DELETE FROM posts WHERE id = ?', [$_POST['delete']]);
                        echo '
                            <script>
                                location.href="updates.php";
                                alert("Post Deleted");
                            </script>
                        ';
                    }
                }
            ?>
        </section>
    </main>
    <?php require('Include/footer.php'); ?>
</body>

</html>