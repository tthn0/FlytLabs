<?php
require_once($GLOBALS["/"] . "/modules/database.php");
require_once($GLOBALS["/"] . "/modules/utilities.php");

define("IS_ADMIN", $_COOKIE["ADMIN_PASSWORD"] ?? null === $_ENV["ADMIN_PASSWORD"]);

class Updates
{
    public static function delete($post)
    {
        Database::query("DELETE FROM posts WHERE id = ?", [$post["delete_post"]]);
        redirect("/updates");
    }
    public static function update($post)
    {
        $new_body = trim($post["newBody"]);
        $new_body = str_replace("<br>", "\r\n", $new_body);
        Database::query("UPDATE posts SET body = ? WHERE id = {$post["id"]}", [$new_body]);
        redirect("/post?id={$post["id"]}");
    }
    public static function post($post, $files)
    {
        $image_size = $files["image"]["size"]; // Bytes
        $image_error = $files["image"]["error"];
        if ($image_size === 0) {
            $image = null;
        } else if ($image_error) {
            alert("Error code: $image_error");
            return;
        } else if ($image_size / (1024 * 1024) >= 15) {
            alert("Image must be less than 15MB.");
            return;
        } else {
            $authorization = "Authorization: Client-ID {$_ENV["IMGUR_CLIENT_ID"]}";
            $content_type = "Content-Type: application/x-www-formurlencoded";
            $options = array(
                "http" => array(
                    "method" => "POST",
                    "header" => "$authorization\n$content_type",
                    "content" => base64_encode(
                        file_get_contents($files["image"]["tmp_name"])
                    )
                )
            );
            $context = stream_context_create($options);
            $response = file_get_contents("https://api.imgur.com/3/image", false, $context);
            $json = json_decode($response);
            $image = $json->data->link;
        }
        Database::query(
            "INSERT INTO posts (epoch, title, body, image) VALUES (?,?,?,?)",
            [time(), $post["title"], $post["body"], $image]
        );
    }
    public static function display_admin_screen()
    {
        if (!IS_ADMIN)
            return;
        echo <<<ADMIN_SCREEN
            <form autocomplete="off" method="POST" enctype="multipart/form-data">
                <span>
                    <input type="text" name="title" placeholder="Title Your Post" required>
                </span>
                <span>
                    <textarea name="body" placeholder="Say something to the FlytLabs community..." required></textarea>
                </span>
                <input type="file" name="image" id="file" accept="image/*" onchange="updateThumbnailLabel()">
                <label for="file">Choose Thumbnail Image</label>
                <input type="submit" name="post_update" value="Post">
            </form>
        ADMIN_SCREEN;
    }
    public static function display_cards()
    {
        $updates = Database::query("SELECT * FROM posts ORDER BY id DESC");
        foreach ($updates as $u) {
            $id = $u["id"];
            $title = htmlspecialchars($u["title"]);
            $body = htmlspecialchars($u["body"]);
            $image = $u["image"];
            $epoch = $u["epoch"];
            $more = null;
            $delete = null;

            $body = str_replace("\r\n", "<br>", $body);

            $image = $image ? "<img src='{$image}'alt='Posted Image'>" : null;

            date_default_timezone_set("America/Chicago");
            $date = date('F j, Y \a\t g:i a', $epoch);

            if (strlen($body) > 300) {
                $body = substr($body, 0, 300) . "...";
                $more = "<a href='/post?id=$id'>Read More</a>";
            }

            if (IS_ADMIN && !$more) {
                $delete = <<<DELETE
                    <form method="POST">
                        <input type="submit" name="delete_post" value="$id">
                        <p class="delete">Delete</p>
                    </form>
                DELETE;
            }

            echo <<<CARD
                <div class="card">
                    $image
                    <div>
                        <div class="top">
                            <span class="title">$title</span>
                            <span class="date">$date</span>
                        </div>
                        <p class="body">$body</p>
                        $more
                        $delete
                    </div>
                </div>
            CARD;
        }
    }
}