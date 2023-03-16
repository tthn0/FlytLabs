<?php
$is_already_admin = $_COOKIE["ADMIN_PASSWORD"] ?? null === $_ENV["ADMIN_PASSWORD"];
if ($is_already_admin) {
    $message = "It looks like you already have admin privileges. Please visit another page or use the button below to post an update!";
} else {
    setcookie("ADMIN_PASSWORD", $_ENV["ADMIN_PASSWORD"], time() + 5 * 60, "/", "", false, true);
    $message = "You have been granted admin rights for 5 minutes. You may now make a post, edit a previous post, or delete an existing post!";
}