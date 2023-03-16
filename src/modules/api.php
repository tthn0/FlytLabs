<?php
require_once($GLOBALS["/"] . "/modules/database.php");

header("Content-Type: application/json; charset=utf-8");

// $data = Database::query(
//     "INSERT INTO posts (epoch, title, body) VALUES (?,?,?)",
//     [time(), $_GET["title"], $_GET["body"]]
// );

// if (isset($_POST["submit"])) {
//     Database::query(
//         "INSERT INTO posts (epoch, title, body) VALUES (?,?,?)",
//         [time(), $_POST["title"], $_POST["body"]]
//     );
// }

if (isset($_GET['id']))
    $data = Database::query("SELECT * FROM posts WHERE id = ?", [$_GET['id']]);
else
    $data = Database::query("SELECT * FROM posts", []);

echo json_encode($data, JSON_PRETTY_PRINT);