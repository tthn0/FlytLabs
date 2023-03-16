<?php
function alert($message)
{
    echo "<script>alert('$message');</script>";
}
function load_environment_variables()
{
    $env = parse_ini_file($GLOBALS["/"] . "/config/.env");
    foreach ($env as $key => $value)
        $_ENV[$key] = $value;
}
function load_page($page, $title, $description = "")
{
    $self_url = "http" . (isset($_SERVER["HTTPS"]) ? "s" : "") . "://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
    $social_preview_link = $self_url . "/assets/social_preview/social_preview.png";
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo <<<HEAD
        <head>
            <!-- Primary Meta Tags -->
            <title>$title</title>
            <meta name="title" content="$title">
            <meta name="description" content="$description">

            <!-- Open Graph / Facebook -->
            <meta property="og:type" content="website">
            <meta property="og:url" content="$self_url">
            <meta property="og:title" content="$title">
            <meta property="og:description" content="$description">
            <meta property="og:image" content="$social_preview_link">

            <!-- Twitter -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="$self_url">
            <meta property="twitter:title" content="$title">
            <meta property="twitter:description" content="$description">
            <meta property="twitter:image" content="$social_preview_link">

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="author" content="FlytLabs">
            <meta name="keywords" content="flytlabs, unifye, xobus, aesthetica, importable, tech, technology">
            <meta name="theme-color" media="(prefers-color-scheme: light)" content="rgb(252, 252, 252)">
            <meta name="theme-color" media="(prefers-color-scheme: dark)" content="rgb(8, 20, 26)">
            <meta name="format-detection" content="telephone=no">
            <meta name="format-detection" content="date=no">
            <meta name="format-detection" content="address=no">
            <meta name="format-detection" content="email=no">
            <link rel="apple-touch-icon" href="/assets/icons/favicon.png">
            <link rel="shortcut icon" type="image/x-icon" href="/assets/icons/favicon.png">
            <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
            <link rel="stylesheet" type="text/css" href="/assets/css/pages/$page.css">
            <script defer src="/assets/js/hamburger_menu.js"></script>
        </head>
    HEAD;
    require($GLOBALS["/"] . "/templates/pages/$page.php");
    echo "</html>";
}
function redirect($path)
{
    echo "<script>location.href='$path'</script>";
}