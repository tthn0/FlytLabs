<?php
require_once($GLOBALS["/"] . "/modules/utilities.php");

load_environment_variables();

class Database
{
    public static function query($sql, $parameters = [])
    {
        try {
            $pdo = new PDO("sqlite:" . $GLOBALS["/"] . "/database/database.sqlite");
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $stmt = $pdo->prepare($sql);
            $success = $stmt->execute($parameters); // Returns true on succcess, false on fail
            $data = $stmt->fetchAll();
            $stmt = null;
            $pdo = null; // Close connection
            return $data;
        } catch (PDOException $e) {
            alert($e->getMessage());
        }
    }
}