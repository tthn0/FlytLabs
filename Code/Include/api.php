<?php

    # API
    # header('Content-Type: application/json; charset=utf-8');
    # $var = DB::query("SELECT * FROM posts WHERE id = ?", [$_GET['id']]);
    # echo json_encode($var, JSON_PRETTY_PRINT);

    define('HOST', 'remotemysql.com:3306' , true);
    define('USER', 'Gxb0lQ1Ln0'           , true);
    define('PASS', 'BULpZ3sqgQ'           , true);
    define( 'DB' , 'Gxb0lQ1Ln0'           , true);

    class DB {

        # Check Connection
        public static function status() {
            try {
                $conn = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo '<p style="color:green;">Connection established</p>';
            } catch(PDOException $e) {
                die('<p style="color:red;">' .$e->getMessage() . '</p>');
            }
        }

        public static function query($sql, $parameters = []) {
            try {
                $pdo = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                $stmt = $pdo->prepare($sql);
                $success = $stmt->execute($parameters); # Returns true on succcess, false on fail
                $data = $stmt->fetchAll();
                # Clear, Close, Return
                $stmt = null;
                $pdo = null;
                return $data;
            } catch(PDOException $e) {
                die('<p style="color:red;">' .$e->getMessage() . '</p>');
            }
        }
    }

    # API
    // header('Content-Type: application/json; charset=utf-8');
    // $var = DB::query("SELECT * FROM posts WHERE id = ?", [$_GET['id']]);
    // echo json_encode($var, JSON_PRETTY_PRINT);
    
    // DB::query(
    //     'INSERT INTO posts (title, body, date) VALUES (?,?,?)',
    //     [$_GET['title'], $_GET['body'], time()]
    // );
    
    // DB::query(
    //     'INSERT INTO test (username, password) VALUES (?,?)',
    //     ['user1', 'pass1']
    // );

    header('Content-Type: application/json; charset=utf-8');
    // $var = DB::query("SELECT * FROM posts WHERE id = ?", [$_GET['id']]);
    $var = DB::query("SELECT * FROM posts", []);
    echo json_encode($var, JSON_PRETTY_PRINT);

    if(isset($_POST['submit'])) {
        DB::query(
            'INSERT INTO posts (title, body, date) VALUES (?,?,?)',
            [$_POST['title'], $_POST['body'], time()]
        );
    }
?>