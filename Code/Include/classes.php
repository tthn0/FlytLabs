<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

    $dotenv = Dotenv\Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
    $dotenv->load();

    define('HOST', $_ENV['ENV_HOST'], true);
    define('USER', $_ENV['ENV_USER'], true);
    define('PASS', $_ENV['ENV_PASS'], true);
    define('DB', $_ENV['ENV_DB'], true);
    define('PW', $_ENV['ENV_PW'], true);
    define('IMGUR_API_KEY', $_ENV['ENV_IMGUR_API_KEY'], true);

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
    
    class Newsletter {
        public function __construct($post) {

            $email = trim($post['email']);

            if(empty($post['honeypot'])) {

                if(empty($email)) {
                    echo '<script>
                        alert("Make sure email is filled out.");
                    </script>';
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo '<script>
                        alert("The email you entered is invalid.");
                    </script>';
                } else if(Self::getEmail($email)) {
                    echo '<script>
                        alert("The email you entered has already subscribed to the newsletter.");
                    </script>';
                } else {
                    DB::query('INSERT INTO newsletter (email) VALUES (?)', [$email]);
                    echo '<script>
                        alert("Thank you for subscribing to our newsletter!");
                    </script>';
                }
            }
        }
        
        # Returns email if it already exists, returns false if it doesn't
        private static function getEmail($email) {
           $data = DB::query("SELECT * FROM newsletter WHERE email = ?", [$email]);
           if(empty($data[0]['email'])) {
              return null;
           } else {
              return $data[0]['email'];
           }
        }
    }

    class Post {

        public function __construct($post, $files) {
            
            date_default_timezone_set ('America/Chicago');

            if($files['image']['size'] > 0) {
        
                if($files['image']['size'] > 10240000) {
                    die('Image too large, must be less than 10MB');
                } else {

                    $options = array('http'=>array(
                        'method'=>"POST",
                        'header'=>"Authorization: Bearer " . IMGUR_API_KEY . "\nContent-Type: application/x-www-formurlencoded",
                        'content'=>base64_encode(file_get_contents($files['image']['tmp_name']))
                    ));
            
                    $context = stream_context_create($options);
        
                    $response = file_get_contents('https://api.imgur.com/3/image', false, $context);
                    $response = json_decode($response);
        
                    DB::query(
                        'INSERT INTO posts (title, body, image, date) VALUES (?,?,?,?)',
                        [$post['title'], $post['body'], $response->data->link, time()]
                    );
                    
                }
            } else {
                DB::query(
                    'INSERT INTO posts (title, body, date) VALUES (?,?,?)',
                    [$post['title'], $post['body'], time()]
                );
            }

        }
    }
?>