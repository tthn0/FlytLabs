<?php
    require('Include/classes.php');
?>

<html lang="en">

<head>
    <title>FlytLabs | View a post in full detail</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="FlytLabs">
    <meta name="keywords" content="flytlabs, flyt, unifye, unifye.io, unifye lookup, importable, xobus, aesthetica, aiaesthetica, aestheticaai, aesthetica twitter, tech, technology, html, html5, hypertext markup language, css, css3, cascading style sheets, js, es6, javascript, python, python3, php, hypertext preprocessor">
    <meta name="description" content="View a post in full detail">
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
            border-radius: .5em;
            font-size: 1.1em;
        }

        main div.post div.top span {
            display: block;
        }

        main div.post div.top span.title {
            margin-top: 2em;
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
        }

        main div.post p.body, main div.post div.body {
            display: inline-block;
            margin-top: 2em;
            line-height: 1.6em;
            width: 100%;
        }

        main div.post a {
            display: inline-block;
            margin-top: 1em;
            font-size: .8em;
            font-weight: 600;
            color: rgb(25, 151, 243);
            text-decoration: none;
        }

        main section div.post form {
            position: relative;
            margin-top: 3em;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 1em;
        }

        main section div.post form input[name="edit"]:hover,
        main section div.post form input[name="edit"]:focus {
            cursor: pointer;
            filter: hue-rotate(10deg);
            transition: .3s ease;
        }

        main section div.post form input:first-of-type,
        main section div.post form input:last-of-type {
            font-size: .85em;
            position: absolute;
            opacity: 0;
            z-index: 1;
            height: 1.5em;
            min-width: 1.25em;
            max-width: 1.25em;
        }

        main section div.post form input:hover {
            cursor: pointer;
        }

        main section div.post form input:last-of-type {
            left: 3.5em;
        }

        main section div.post form i:first-of-type,
        main section div.post form i:last-of-type {
            position: absolute;
            left: 0;
        }

        main section div.post form i:last-of-type {
            left: 3em;
        }

        main div.post button {
            display: none;
            font-size: .9em;
            margin-top: 2em;
            padding: .8em 2.5em;
            border-radius: 100em;
            border: none;
            color: white;
            background: linear-gradient(to left, var(--leftBlue), var(--rightBlue));
            transition: .3s ease;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(52, 235, 206, .25);
        }

        main div.post button:hover,
        main div.post button:focus  {
            cursor: pointer;
            filter: hue-rotate(10deg);
            transition: .3s ease;
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
                margin: 4em 5em 0 5em;
                position: relative;
            }

            main div.post {
                font-size: 1em;
            }

            main section div.post form input {
                font-size: .9em;
            }

            main div.post p.body {
                margin-top: 1.5em;
            }

            main section div.post form {
                margin-top: 2em;
            }
        }

        @media only screen and (max-width: 600px) {
            main {
                margin: 4em 4em 0 4em;
            }
            
            main div.post {
                font-size: .9em;
            }
        }

        @media only screen and (max-width: 500px) {
            main {
                margin: 4em 2em 0 2em;
            }
        }

        @media only screen and (max-width: 400px) {
            main {
                margin: 4em 1.5em 0 1.5em;
            }

            main section > form h1 {
                font-size: 1.4em;
            }

            main div.post {
                font-size: .8em;
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
                margin: 4em 2em 0 1em;
            }

            main div.post {
                font-size: .75em;
            }

            main div.post div.top span.title {
                font-size: 1.1em;
            }

            main div.post div.top span.time {
                font-size: .45em;
            }
        }

        @media (prefers-color-scheme: dark) {

            main div.post span.title {
                color: aliceblue;
            }

            main div.post div.body {
                color: aliceblue;
            }
            
            main section div.post form i {
                color: aliceblue;
            }

        }
    </style>
    <script defer>

        function formSubmit(content) {
            document.form.newBody.value = content;
            document.form.submit();
        }

        let bool = true;
        
        function toggleEdit() {

            document.querySelector('div.body').toggleAttribute('contenteditable');
            document.querySelector('i.fas').classList.toggle('fa-edit');
            document.querySelector('i.fas').classList.toggle('fa-ban');

            if(bool) {
                document.querySelector('div.post button').style.display = 'inline-block';
            } else {
                location.reload();
            }

            bool = !bool;
        }
    </script>
</head>

<body>
    <?php require('Include/header.php'); ?>
    <main>
        <section>
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
                    'SELECT * FROM posts WHERE id = ?', [$_GET['id']]
                );

                if(empty($posts)) {
                    echo '<script>
                        location.href="404.php";
                    </script>';
                }

                foreach($posts as $p) {

                    $id = $p['id'];
                    $title = htmlspecialchars($p['title']);
                    // $body = htmlspecialchars($p['body']);
                    $body = $p['body'];
                    $image = $p['image'];
                    $date = time() - intval($p['date']);
                    $form = '';
                    
                    // $body = preg_replace('~\r\n?~', "\n", $body);
                    // $body = str_replace("\n\n", '<br><br>', $body);

                    $body = nl2br($body);

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
                                    <input type="text" name="edit" onclick="toggleEdit()">
                                    <i class="fas fa-edit"></i>
                                    <input type="submit" name="delete" value="' . $id . '" tabindex="-1">
                                    <i class="fa fa-trash"></i>
                                </form>
                            ';
                        }
                    }
                    
                    echo '
                        <div class="post">
                            ' . $image . '
                            ' . $form . '
                            <div>
                                <div class="top">
                                    <span class="title">' . $title . '</span>
                                    <span class="time">Posted ' . $time . '</span>
                                </div>
                                <div class="body" id="eLink">
                                    ' . $body . '
                                </div>
                                <button onclick="formSubmit(document.getElementById(`eLink`).innerHTML)">Save</button>
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

                    if(isset($_POST['newBody'])) {
                        
                        $newbody = trim($_POST['newBody']);
                        // $newbody = str_replace("\n<br>", "\n", $newbody);
                        // $newbody = strip_tags($newbody);

                        function str_lreplace($search, $replace, $subject)
                        {
                            $pos = strrpos($subject, $search);

                            if($pos !== false)
                            {
                                $subject = substr_replace($subject, $replace, $pos, strlen($search));
                            }

                            return $subject;
                        }

                        // $newbody = str_lreplace('<br>', '', $newbody);

                        DB::query("UPDATE posts SET body = ? WHERE id = '$id'", [$newbody]);
                        echo '<script>
                            location.href = `post.php?id=' . $id . '`;
                        </script>';

                    }
                }
            ?>
        </section>

        <form name="form" method="POST">
            <input type="hidden" name="newBody">
        </form>

    </main>
    <?php require('Include/footer.php'); ?>
    <script>
        let ce = document.querySelector('div.body');
        ce.addEventListener('paste', function (e) {
            e.preventDefault();
            let text = e.clipboardData.getData('text/plain');
            document.execCommand('insertText', false, text);
        });
    </script>
</body>

</html>