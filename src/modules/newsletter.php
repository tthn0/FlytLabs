<?php
require_once($GLOBALS["/"] . "/modules/database.php");
require_once($GLOBALS["/"] . "/modules/utilities.php");

class Newsletter
{
    public static function add_email($post)
    {
        if (!empty($post["honeypot"]))
            return;
        $email = trim($post["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message = "The email you entered is invalid.";
        else if (self::email_exists($email))
            $message = "The email you entered has already subscribed to the newsletter.";
        else {
            $message = "Thank you for subscribing to our newsletter!";
            Database::query("INSERT INTO newsletter (email) VALUES (?)", [$email]);
        }
        alert($message);
    }
    private static function email_exists($email)
    {
        $data = Database::query("SELECT * FROM newsletter WHERE email = ?", [$email]);
        return !empty($data);
    }
}